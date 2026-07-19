<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Booking;
use App\Helpers\PricingEngine;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OtaApiController extends Controller
{
    /**
     * Endpoint for checking vehicle availability and pricing (OTA_VehAvailRate).
     * Supports both JSON and XML responses based on headers or query parameters.
     */
    public function checkAvailability(Request $request)
    {
        $pickupLoc = $request->query('pickup_location');
        $pickupDate = $request->query('pickup_date');
        $returnDate = $request->query('return_date');
        $format = $request->query('format', $request->header('Accept') === 'application/xml' ? 'xml' : 'json');

        if (!$pickupDate || !$returnDate) {
            return $this->formatResponse([
                'status' => 'error',
                'message' => 'Missing pickup_date or return_date parameters (Format: YYYY-MM-DD HH:MM).'
            ], $format, 400);
        }

        try {
            $pickupDt = Carbon::parse($pickupDate);
            $returnDt = Carbon::parse($returnDate);
        } catch (\Exception $e) {
            return $this->formatResponse([
                'status' => 'error',
                'message' => 'Invalid date format. Use YYYY-MM-DD HH:MM.'
            ], $format, 400);
        }

        $cars = Car::all();
        $availableVehicles = [];

        foreach ($cars as $car) {
            // Check available count
            $availableQty = $car->getAvailableCountForRange($pickupDt, $returnDt);

            if ($availableQty > 0 || $car->allow_overbooking) {
                // Calculate seasonal pricing
                $pricing = PricingEngine::calculatePrice($car, $pickupDt, $returnDt);
                
                $availableVehicles[] = [
                    'vehicle_id' => $car->id,
                    'brand' => $car->brand,
                    'model' => $car->model,
                    'category' => $car->category,
                    'transmission' => $car->transmission,
                    'ac' => $car->ac ? 'Yes' : 'No',
                    'seats' => $car->seats,
                    'available_quantity' => $car->allow_overbooking ? 99 : $availableQty,
                    'rate_per_day' => $pricing['average_daily_rate'],
                    'currency' => 'MAD',
                    'total_price' => $pricing['total_price'],
                    'days' => $pricing['days'],
                ];
            }
        }

        $payload = [
            'status' => 'success',
            'pickup_location' => $pickupLoc ?: 'Marrakech Airport (RAK)',
            'pickup_datetime' => $pickupDt->toDateTimeString(),
            'return_datetime' => $returnDt->toDateTimeString(),
            'vehicles' => $availableVehicles
        ];

        return $this->formatResponse($payload, $format);
    }

    /**
     * Endpoint for booking reservations from external channels (OTA_VehBook).
     */
    public function createBooking(Request $request)
    {
        $format = $request->query('format', $request->header('Accept') === 'application/xml' ? 'xml' : 'json');

        // Allow posting either in standard HTTP Form, JSON, or raw XML
        $data = $request->all();
        if (str_contains($request->header('Content-Type', ''), 'application/xml')) {
            $data = $this->parseXml($request->getContent());
        }

        $carId = $data['vehicle_id'] ?? null;
        $customerName = $data['customer_name'] ?? null;
        $customerEmail = $data['customer_email'] ?? null;
        $customerPhone = $data['customer_phone'] ?? null;
        $pickupDate = $data['pickup_date'] ?? null;
        $returnDate = $data['return_date'] ?? null;
        $source = $data['source'] ?? 'ota'; // e.g. booking.com, discoverycars

        if (!$carId || !$customerName || !$pickupDate || !$returnDate) {
            return $this->formatResponse([
                'status' => 'error',
                'message' => 'Missing required fields: vehicle_id, customer_name, pickup_date, return_date.'
            ], $format, 400);
        }

        $car = Car::find($carId);
        if (!$car) {
            return $this->formatResponse([
                'status' => 'error',
                'message' => 'Vehicle not found.'
            ], $format, 404);
        }

        $pickupDt = Carbon::parse($pickupDate);
        $returnDt = Carbon::parse($returnDate);

        // Check availability
        $availableQty = $car->getAvailableCountForRange($pickupDt, $returnDt);
        if ($availableQty <= 0 && !$car->allow_overbooking) {
            return $this->formatResponse([
                'status' => 'error',
                'message' => 'No vehicles available for the selected dates.'
            ], $format, 409);
        }

        // Calculate Pricing
        $pricing = PricingEngine::calculatePrice($car, $pickupDt, $returnDt);

        // Save Reservation
        $booking = Booking::create([
            'booking_reference' => Booking::generateReference(),
            'car_id' => $car->id,
            'customer_name' => $customerName,
            'customer_email' => $customerEmail ?: 'info@ota-partner.com',
            'customer_phone' => $customerPhone ?: '000000',
            'pickup_location' => $data['pickup_location'] ?? 'Marrakech Airport (RAK)',
            'return_location' => $data['return_location'] ?? 'Marrakech Airport (RAK)',
            'pickup_datetime' => $pickupDt,
            'return_datetime' => $returnDt,
            'total_price' => $pricing['total_price'],
            'status' => 'confirmed', // OTA bookings are auto-confirmed if inventory matches
            'source' => $source,
        ]);

        return $this->formatResponse([
            'status' => 'success',
            'booking_reference' => $booking->booking_reference,
            'total_price' => $booking->total_price,
            'currency' => 'MAD',
            'reservation_status' => 'Confirmed'
        ], $format);
    }

    /**
     * Format output to either JSON or XML response.
     */
    private function formatResponse($data, $format, $statusCode = 200)
    {
        if ($format === 'xml') {
            $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><VehAvailRateRS/>');
            $this->arrayToXml($data, $xml);
            return response($xml->asXML(), $statusCode)->header('Content-Type', 'application/xml');
        }

        return response()->json($data, $statusCode);
    }

    /**
     * Recursive function to convert array to XML.
     */
    private function arrayToXml($array, &$xmlElement)
    {
        foreach ($array as $key => $value) {
            if (is_int($key)) {
                $key = 'item'; // replace integer keys with generic elements
            }
            if (is_array($value)) {
                $subnode = $xmlElement->addChild($key);
                $this->arrayToXml($value, $subnode);
            } else {
                $xmlElement->addChild($key, htmlspecialchars($value));
            }
        }
    }

    /**
     * Parse raw XML string to array helper.
     */
    private function parseXml($xmlString)
    {
        try {
            $xml = simplexml_load_string(trim($xmlString));
            return json_decode(json_encode($xml), true);
        } catch (\Exception $e) {
            return [];
        }
    }
}
