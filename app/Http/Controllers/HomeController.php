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
        
        $cars = Car::orderBy('display_order')->get();
        
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
        
        $pricing = ['days' => 4]; // fallback
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

        // 3. Fetch and merge partner inventory
        $partnerCars = \App\Helpers\PartnerAggregator::fetchPartnerCars($pickupDt->toDateTimeString(), $returnDt->toDateTimeString());

        // --- Own fleet: already ordered by display_order from DB query ---
        $ownCarsMapped = [];
        foreach ($cars as $car) {
            // Count active overlapping bookings
            $bookingsCount = $car->bookings()
                ->where('status', '!=', 'cancelled')
                ->where(function ($q) use ($pickupDt, $returnDt) {
                    $q->whereBetween('pickup_datetime', [$pickupDt, $returnDt])
                      ->orWhereBetween('return_datetime', [$pickupDt, $returnDt])
                      ->orWhere(function ($q2) use ($pickupDt, $returnDt) {
                          $q2->where('pickup_datetime', '<=', $pickupDt)
                             ->where('return_datetime', '>=', $returnDt);
                      });
                })->count();

            $ownCarsMapped[] = [
                'id' => (string) $car->id,
                'brand' => $car->brand,
                'model' => $car->model,
                'category' => $car->category,
                'seats' => $car->seats,
                'transmission' => $car->transmission,
                'ac' => $car->ac ? 'Yes' : 'No',
                'quantity' => $car->quantity,
                'allow_overbooking' => $car->allow_overbooking,
                'total_bookings_count' => $bookingsCount,
                'display_price' => $car->display_price,
                'total_price' => $car->total_price,
                'image_path' => $car->image_path,
                'video_path' => $car->video_path,
                'is_available' => $car->is_available,
                'available_count' => $car->available_count,
                'is_partner' => false,
                'partner_name' => '',
                'partner_id' => null,
                'partner_vehicle_id' => null,
                'days' => $car->days ?? 4,
                'display_order' => $car->display_order ?? 99,
                'company_name' => 'Car Airport Morocco',
                'company_logo' => asset('/images/logo.png'),
            ];
        }

        // --- Partner cars: sorted by their partner site's display_order ---
        $partnerOrders = \App\Models\PartnerSite::pluck('display_order', 'id')->toArray();

        usort($partnerCars, function ($a, $b) use ($partnerOrders) {
            $orderA = $partnerOrders[$a['partner_id']] ?? 99;
            $orderB = $partnerOrders[$b['partner_id']] ?? 99;
            return $orderA <=> $orderB;
        });

        $partnerCarsMapped = [];
        foreach ($partnerCars as $pCar) {
            $partnerCarsMapped[] = [
                'id' => $pCar['id'],
                'brand' => $pCar['brand'],
                'model' => $pCar['model'],
                'category' => $pCar['category'],
                'seats' => $pCar['seats'],
                'transmission' => $pCar['transmission'],
                'ac' => $pCar['ac'],
                'quantity' => $pCar['quantity'],
                'display_price' => $pCar['base_price'],
                'total_price' => $pCar['total_price'],
                'image_path' => $pCar['image_path'],
                'video_path' => null,
                'is_available' => true,
                'available_count' => 1,
                'is_partner' => true,
                'is_affiliate' => $pCar['is_affiliate'] ?? false,
                'affiliate_url' => $pCar['affiliate_url'] ?? '',
                'partner_name' => $pCar['partner_name'],
                'partner_id' => $pCar['partner_id'],
                'partner_vehicle_id' => $pCar['partner_vehicle_id'],
                'days' => $pricing['days'] ?? 4,
                'company_name' => $pCar['company_name'] ?? $pCar['partner_name'],
                'company_logo' => $pCar['company_logo'] ?? null,
                'company_rating' => $pCar['company_rating'] ?? null,
            ];
        }

        // Pertinence order: own fleet first (by display_order), then partner cars (by partner display_order)
        $pertinenceMerged = array_merge($ownCarsMapped, $partnerCarsMapped);

        // Assign a global pertinence rank for client-side JS re-sorting
        foreach ($pertinenceMerged as $idx => &$item) {
            $item['pertinence_rank'] = $idx;
        }
        unset($item);

        $cars = collect(array_map(fn($item) => (object) $item, $pertinenceMerged));

        $extras  = \App\Models\Extra::all();
        $reviews = \App\Services\GoogleReviewsService::getReviewsData();

        // --- Dynamic SEO Meta Tags Generation ---
        $locName = $searchParams['pickup_location'];
        $cleanLoc = 'Marrakech Airport (RAK)';
        if (str_contains($locName, 'Casablanca')) {
            $cleanLoc = 'Casablanca Airport (CMN)';
        } elseif (str_contains($locName, 'Agadir')) {
            $cleanLoc = 'Agadir Airport (AGA)';
        } elseif (str_contains($locName, 'Tanger')) {
            $cleanLoc = 'Tanger Airport (TNG)';
        }

        if ($locale === 'fr') {
            $seoTitle = "Location Voiture " . str_replace(" Airport", "", $cleanLoc) . " Pas Cher | Car Airport";
            $seoDescription = "Réservez votre voiture de location à " . $cleanLoc . " à partir de 250 DH/jour. Livraison gratuite à l'aéroport, assurance tous risques, kilométrage illimité et contact direct via WhatsApp.";
        } else {
            $seoTitle = "Rent a Car " . $cleanLoc . " | Best Rates - Car Airport Morocco";
            $seoDescription = "Rent a car at " . $cleanLoc . " from 250 DH per day. Free airport terminal delivery, full comprehensive insurance, unlimited mileage, and direct WhatsApp confirmation.";
        }

        return view('home', compact('cars', 'searchParams', 'locale', 'extras', 'reviews', 'seoTitle', 'seoDescription'));
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

        $carName = $booking->car ? ($booking->car->brand . ' ' . $booking->car->model) : 'Partner Car';

        return response()->json([
            'status' => 'success',
            'car_name' => $carName,
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

        return redirect()->route('home', ['locale' => $locale])->with('success', 'Your message has been sent successfully. We will get back to you soon!');
    }

    public function faq(Request $request, $locale = 'en')
    {
        return view('faq', compact('locale'));
    }

    public function terms(Request $request, $locale = 'en')
    {
        return view('terms', compact('locale'));
    }

    public function privacy(Request $request, $locale = 'en')
    {
        return view('privacy', compact('locale'));
    }

    public function cookie(Request $request, $locale = 'en')
    {
        return view('cookie', compact('locale'));
    }

    public function about(Request $request, $locale = 'en')
    {
        return view('about', compact('locale'));
    }

    public function sitemap()
    {
        $pages = ['', 'about', 'faq', 'terms', 'privacy', 'cookie'];
        $urls = [];
        $now = \Carbon\Carbon::now()->toIso8601String();

        foreach ($pages as $page) {
            $basePath = $page === '' ? '' : '/' . $page;
            $enUrl = url('/en' . $basePath);
            $frUrl = url('/fr' . $basePath);

            $urls[] = [
                'loc' => $enUrl,
                'lastmod' => $now,
                'changefreq' => 'weekly',
                'priority' => $page === '' ? '1.0' : '0.8',
                'alternates' => [
                    ['lang' => 'en', 'href' => $enUrl],
                    ['lang' => 'fr', 'href' => $frUrl],
                    ['lang' => 'x-default', 'href' => $enUrl],
                ]
            ];

            $urls[] = [
                'loc' => $frUrl,
                'lastmod' => $now,
                'changefreq' => 'weekly',
                'priority' => $page === '' ? '1.0' : '0.8',
                'alternates' => [
                    ['lang' => 'en', 'href' => $enUrl],
                    ['lang' => 'fr', 'href' => $frUrl],
                    ['lang' => 'x-default', 'href' => $enUrl],
                ]
            ];
        }

        return response()->view('sitemap', compact('urls'))
            ->header('Content-Type', 'text/xml');
    }

    public function robots()
    {
        $sitemapUrl = url('/sitemap.xml');
        $robots = <<<TEXT
User-agent: *
Disallow: /en/admin
Disallow: /fr/admin
Disallow: /admin
Allow: /

Sitemap: {$sitemapUrl}
TEXT;

        return response($robots)->header('Content-Type', 'text/plain');
    }
}
