<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Booking;
use App\Models\SeasonalPrice;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Display admin control dashboard.
     */
    public function index($locale = 'en')
    {
        $cars = Car::all();
        $bookings = Booking::with('car')->orderBy('created_at', 'desc')->get();
        $seasonalPrices = SeasonalPrice::with('car')->orderBy('start_date', 'asc')->get();

        return view('admin.dashboard', compact('cars', 'bookings', 'seasonalPrices', 'locale'));
    }

    /**
     * Add a new vehicle to the fleet.
     */
    public function storeCar(Request $request, $locale = 'en')
    {
        $request->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'category' => 'required|string',
            'seats' => 'required|integer',
            'transmission' => 'required|string',
            'quantity' => 'required|integer',
            'base_price' => 'required|numeric',
        ]);

        Car::create([
            'brand' => $request->brand,
            'model' => $request->model,
            'category' => $request->category,
            'seats' => $request->seats,
            'transmission' => $request->transmission,
            'ac' => $request->has('ac'),
            'quantity' => $request->quantity,
            'allow_overbooking' => $request->has('allow_overbooking'),
            'base_price' => $request->base_price,
            'image_path' => $request->image_path ?: '/images/default.jpg',
            'video_path' => $request->video_path ?: null,
        ]);

        return redirect()->route('admin.dashboard', ['locale' => $locale])->with('success', 'Car added successfully.');
    }

    /**
     * Edit/Update an existing car.
     */
    public function updateCar(Request $request, $locale = 'en', $id)
    {
        $car = Car::findOrFail($id);
        
        $car->update([
            'brand' => $request->brand,
            'model' => $request->model,
            'category' => $request->category,
            'seats' => $request->seats,
            'transmission' => $request->transmission,
            'ac' => $request->has('ac'),
            'quantity' => $request->quantity,
            'allow_overbooking' => $request->has('allow_overbooking'),
            'base_price' => $request->base_price,
            'image_path' => $request->image_path ?: $car->image_path,
            'video_path' => $request->video_path ?: $car->video_path,
        ]);

        return redirect()->route('admin.dashboard', ['locale' => $locale])->with('success', 'Car updated successfully.');
    }

    /**
     * Remove a vehicle from fleet.
     */
    public function deleteCar($locale = 'en', $id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect()->route('admin.dashboard', ['locale' => $locale])->with('success', 'Car removed successfully.');
    }

    /**
     * Create seasonal price rules.
     */
    public function storePricing(Request $request, $locale = 'en')
    {
        $request->validate([
            'name' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'adjustment_type' => 'required|string', // percentage or flat_rate
            'value' => 'required|numeric',
        ]);

        SeasonalPrice::create([
            'car_id' => $request->car_id ?: null, // null for all cars
            'name' => $request->name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'adjustment_type' => $request->adjustment_type,
            'value' => $request->value,
        ]);

        return redirect()->route('admin.dashboard', ['locale' => $locale])->with('success', 'Seasonal pricing rule saved.');
    }

    /**
     * Delete pricing adjustment rule.
     */
    public function deletePricing($locale = 'en', $id)
    {
        $rule = SeasonalPrice::findOrFail($id);
        $rule->delete();

        return redirect()->route('admin.dashboard', ['locale' => $locale])->with('success', 'Pricing rule deleted.');
    }

    /**
     * Update reservation status.
     */
    public function updateBookingStatus(Request $request, $locale = 'en', $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => $request->status]);

        return redirect()->route('admin.dashboard', ['locale' => $locale])->with('success', 'Booking status updated.');
    }

    /**
     * Create web online booking.
     */
    public function storeBooking(Request $request, $locale = 'en')
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'customer_name' => 'required|string',
            'customer_email' => 'required|email',
            'customer_phone' => 'required|string',
            'pickup_location_val' => 'required|string',
            'pickup_datetime_val' => 'required|string',
            'return_datetime_val' => 'required|string',
        ]);

        $car = Car::findOrFail($request->car_id);
        
        $pickupDt = Carbon::parse($request->pickup_datetime_val);
        $returnDt = Carbon::parse($request->return_datetime_val);

        // Check availability strictly if overbooking is not allowed
        $availableCount = $car->getAvailableCountForRange($pickupDt, $returnDt);
        
        if ($availableCount <= 0 && !$car->allow_overbooking) {
            return back()->with('error', 'Sorry, this car is fully booked for the selected dates.');
        }

        // Calculate Pricing
        $pricing = \App\Helpers\PricingEngine::calculatePrice($car, $pickupDt, $returnDt);

        // Save Booking
        $booking = Booking::create([
            'booking_reference' => Booking::generateReference(),
            'car_id' => $car->id,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'pickup_location' => $request->pickup_location_val,
            'return_location' => $request->pickup_location_val, // assume same for simple mock
            'pickup_datetime' => $pickupDt,
            'return_datetime' => $returnDt,
            'total_price' => $pricing['total_price'],
            'status' => 'pending',
            'source' => 'website',
        ]);

        return redirect()->route('home', ['locale' => $locale])
            ->with('success', 'Booking requested successfully! Reference: ' . $booking->booking_reference);
    }
}
