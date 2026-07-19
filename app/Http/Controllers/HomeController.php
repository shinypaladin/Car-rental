<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Helpers\PricingEngine;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Display landing page with car search results.
     */
    public function index(Request $request, $locale = 'en')
    {
        $pickupDate = $request->query('pickup_date');
        $returnDate = $request->query('return_date');
        
        $cars = Car::all();
        
        $searchParams = [
            'pickup_location' => $request->query('pickup_location', 'Marrakech Airport (RAK)'),
            'pickup_date' => $pickupDate ?: Carbon::now()->addDay()->format('Y-m-d'),
            'pickup_time' => $request->query('pickup_time', '10:00'),
            'return_date' => $returnDate ?: Carbon::now()->addDays(4)->format('Y-m-d'),
            'return_time' => $request->query('return_time', '10:00'),
            'driver_age' => $request->query('driver_age', '25+'),
        ];

        // Format datetimes for pricing engine and availability check
        $pickupDt = Carbon::parse($searchParams['pickup_date'] . ' ' . $searchParams['pickup_time']);
        $returnDt = Carbon::parse($searchParams['return_date'] . ' ' . $searchParams['return_time']);
        
        foreach ($cars as $car) {
            // 1. Calculate price
            $pricing = PricingEngine::calculatePrice($car, $pickupDt, $returnDt);
            $car->display_price = $pricing['average_daily_rate'];
            $car->total_price = $pricing['total_price'];
            $car->days = $pricing['days'];
            
            // 2. Check real availability
            $car->available_count = $car->getAvailableCountForRange($pickupDt, $returnDt);
            $car->is_available = $car->available_count > 0;
        }

        $extras = \App\Models\Extra::all();
        $reviews = \App\Services\GoogleReviewsService::getReviewsData();

        return view('home', compact('cars', 'searchParams', 'locale', 'extras', 'reviews'));
    }

    /**
     * Retrieve booking details by reference (AJAX).
     */
    public function retrieveBooking(Request $request)
    {
        $reference = $request->query('reference');
        
        if (!$reference) {
            return response()->json([
                'status' => 'error',
                'message' => 'Reference parameter is required.'
            ], 400);
        }

        $booking = \App\Models\Booking::where('booking_reference', trim(strtoupper($reference)))->first();

        if (!$booking) {
            return response()->json([
                'status' => 'error',
                'message' => 'Reservation reference not found.'
            ], 404);
        }

        // Return details + other cars in case they want to change
        $cars = Car::all()->map(function($car) {
            return [
                'id' => $car->id,
                'name' => $car->brand . ' ' . $car->model,
                'base_price' => $car->base_price,
            ];
        });

        return response()->json([
            'status' => 'success',
            'booking' => [
                'id' => $booking->id,
                'booking_reference' => $booking->booking_reference,
                'car_id' => $booking->car_id,
                'customer_name' => $booking->customer_name,
                'customer_email' => $booking->customer_email,
                'customer_phone' => $booking->customer_phone,
                'pickup_location' => $booking->pickup_location,
                'return_location' => $booking->return_location,
                'pickup_datetime' => $booking->pickup_datetime->format('Y-m-d\TH:i'),
                'return_datetime' => $booking->return_datetime->format('Y-m-d\TH:i'),
                'total_price' => $booking->total_price,
                'status' => $booking->status,
                'source' => $booking->source,
                'extras' => $booking->extras ?? [],
            ],
            'cars' => $cars
        ]);
    }

    /**
     * Recalculate estimated pricing for public view (AJAX).
     */
    public function recalculatePrice(Request $request)
    {
        $carId = $request->query('car_id');
        $pickup = $request->query('pickup_datetime');
        $return = $request->query('return_datetime');

        if (!$carId || !$pickup || !$return) {
            return response()->json(['status' => 'error', 'message' => 'Missing parameters'], 400);
        }

        $car = Car::find($carId);
        if (!$car) {
            return response()->json(['status' => 'error', 'message' => 'Car not found'], 404);
        }

        try {
            $pickupDt = Carbon::parse($pickup);
            $returnDt = Carbon::parse($return);
            
            $extras = $request->query('extras');
            if (is_string($extras)) {
                $extras = explode(',', $extras);
            }
            if (!is_array($extras)) {
                $extras = [];
            }
            
            $pricing = PricingEngine::calculatePrice($car, $pickupDt, $returnDt, $extras);
            
            return response()->json([
                'status' => 'success',
                'days' => $pricing['days'],
                'total_price' => $pricing['total_price'],
                'average_daily_rate' => $pricing['average_daily_rate']
            ]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Invalid date format'], 400);
        }
    }

    /**
     * Update booking details from public side (AJAX).
     */
    public function updatePublicBooking(Request $request)
    {
        $request->validate([
            'reference' => 'required|exists:bookings,booking_reference',
            'car_id' => 'required|exists:cars,id',
            'customer_name' => 'required|string',
            'customer_email' => 'required|email',
            'customer_phone' => 'required|string',
            'pickup_location' => 'required|string',
            'return_location' => 'nullable|string',
            'pickup_datetime' => 'required|date',
            'return_datetime' => 'required|date|after:pickup_datetime',
            'extras' => 'nullable|array',
        ]);

        $booking = \App\Models\Booking::where('booking_reference', $request->reference)->firstOrFail();

        if ($booking->status === 'cancelled') {
            return response()->json([
                'status' => 'error',
                'message' => 'This reservation is cancelled and cannot be modified.'
            ], 400);
        }

        $car = Car::findOrFail($request->car_id);
        $pickupDt = Carbon::parse($request->pickup_datetime);
        $returnDt = Carbon::parse($request->return_datetime);

        // Check availability (excluding this booking's own ID!)
        $availableCount = $car->getAvailableCountForRange($pickupDt, $returnDt, $booking->id);

        if ($availableCount <= 0 && !$car->allow_overbooking) {
            return response()->json([
                'status' => 'error',
                'message' => 'Sorry, this vehicle is not available for the selected dates.'
            ], 409);
        }

        // Recalculate price
        $selectedExtras = $request->input('extras', []);
        $pricing = PricingEngine::calculatePrice($car, $pickupDt, $returnDt, $selectedExtras);

        $booking->update([
            'car_id' => $car->id,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'pickup_location' => $request->pickup_location,
            'return_location' => $request->return_location ?? $request->pickup_location,
            'pickup_datetime' => $pickupDt,
            'return_datetime' => $returnDt,
            'extras' => $selectedExtras,
            'total_price' => $pricing['total_price'],
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Your reservation was updated successfully! New Total: ' . $booking->total_price . ' DH',
            'total_price' => $booking->total_price
        ]);
    }

    /**
     * Handle public contact request form.
     */
    public function storeContact(Request $request, $locale = 'en')
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'message' => 'required|string',
        ]);

        \App\Models\ContactRequest::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        return back()->with('success', 'Your message has been sent successfully. We will get back to you soon!');
    }
}
