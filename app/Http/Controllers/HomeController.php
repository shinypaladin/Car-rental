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

        return view('home', compact('cars', 'searchParams', 'locale'));
    }
}
