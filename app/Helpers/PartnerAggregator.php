<?php

namespace App\Helpers;

use App\Models\PartnerSite;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PartnerAggregator
{
    /**
     * Fetch available cars from all active partner sites.
     */
    public static function fetchPartnerCars($pickupDate, $returnDate)
    {
        $activePartners = PartnerSite::where('active', true)->get();
        $allPartnerCars = [];

        foreach ($activePartners as $partner) {
            try {
                $vehicles = [];

                if (str_contains($partner->api_url, 'localhost:8000') || str_contains($partner->api_url, '127.0.0.1:8000')) {
                    // Loopback override: Simulate fetching from local database directly
                    $localCars = \App\Models\Car::all();
                    
                    // Parse dates to calculate mock prices
                    $pickupDt = \Carbon\Carbon::parse($pickupDate);
                    $returnDt = \Carbon\Carbon::parse($returnDate);
                    
                    foreach ($localCars as $lc) {
                        $pricing = \App\Helpers\PricingEngine::calculatePrice($lc, $pickupDt, $returnDt);
                        $vehicles[] = [
                            'vehicle_id' => $lc->id,
                            'brand' => $lc->brand . ' (Partner)',
                            'model' => $lc->model,
                            'category' => $lc->category,
                            'seats' => $lc->seats,
                            'transmission' => $lc->transmission,
                            'ac' => $lc->ac ? 'Yes' : 'No',
                            'rate_per_day' => $pricing['average_daily_rate'],
                            'total_price' => $pricing['total_price'],
                            'image_path' => $lc->image_path,
                            'company_name' => 'Loca Morocco',
                            'company_logo' => 'https://via.placeholder.com/50',
                            'company_rating' => 8.2, // Simulated company rating
                        ];
                    }
                } else {
                    // Ensure date formatting is clean for URL query parameters
                    $pickupEncoded = urlencode($pickupDate);
                    $returnEncoded = urlencode($returnDate);

                    $url = rtrim($partner->api_url, '/') . "/availability?pickup_date={$pickupEncoded}&return_date={$returnEncoded}";

                    // HTTP GET request with a strict 2-second timeout
                    $response = Http::timeout(2)
                        ->withHeaders([
                            'X-API-KEY' => $partner->api_key,
                            'Accept' => 'application/json',
                        ])
                        ->get($url);

                    if ($response->successful()) {
                        $data = $response->json();
                        $vehicles = $data['vehicles'] ?? [];
                    }
                }

                foreach ($vehicles as $car) {
                    // Determine markup percent based on category (Dynamic Commission Negotiation)
                    $category = $car['category'] ?? 'Economy';
                    $markupPercent = $partner->markup_percent; // fallback
                    
                    if (!empty($partner->category_markups) && isset($partner->category_markups[$category])) {
                        $markupPercent = (float) $partner->category_markups[$category];
                    }
                    
                    // Apply the commission markup percentage to the daily rate and total price
                    $multiplier = 1 + ($markupPercent / 100);
                    
                    $originalRate = (float) $car['rate_per_day'];
                    $originalTotal = (float) $car['total_price'];
                    
                    $markedUpRate = ceil(round($originalRate * $multiplier, 2));
                    $markedUpTotal = ceil(round($originalTotal * $multiplier, 2));

                    // Generate a unique identifier: partner_{partner_id}_{original_vehicle_id}
                    $compositeId = "partner_{$partner->id}_{$car['vehicle_id']}";

                    // Segregate Company/Supplier from Vehicle Brand
                    $companyName = trim($car['company_name'] ?? $partner->name);
                    $companyLogo = $car['company_logo'] ?? null;

                    // Filter out vehicle by supplier company name if allowed_companies list is set
                    if (!empty($partner->allowed_companies)) {
                        $isAllowed = false;
                        foreach ($partner->allowed_companies as $allowedCompany) {
                            if (stripos($companyName, trim($allowedCompany)) !== false) {
                                $isAllowed = true;
                                break;
                            }
                        }
                        if (!$isAllowed) {
                            continue; // skip this car because its supplier company is not whitelisted
                        }
                    }

                    // Filter out vehicle by brand name if allowed_brands list is set
                    if (!empty($partner->allowed_brands)) {
                        $isAllowedBrand = false;
                        $vehicleBrand = trim($car['brand']);
                        foreach ($partner->allowed_brands as $allowedBrand) {
                            if (stripos($vehicleBrand, trim($allowedBrand)) !== false) {
                                $isAllowedBrand = true;
                                break;
                            }
                        }
                        if (!$isAllowedBrand) {
                            continue; // skip this car because its brand is not whitelisted
                        }
                    }

                    // Filter out vehicle by company rating threshold if min_rating is set
                    $companyRating = isset($car['company_rating']) ? (float) $car['company_rating'] : null;
                    if ($partner->min_rating !== null && $companyRating !== null) {
                        if ($companyRating < $partner->min_rating) {
                            continue; // skip this car because its supplier company rating is too low
                        }
                    }

                    $allPartnerCars[] = [
                        'id' => $compositeId,
                        'brand' => $car['brand'],
                        'model' => $car['model'],
                        'category' => $car['category'] ?? 'Economy',
                        'seats' => $car['seats'] ?? 5,
                        'transmission' => $car['transmission'] ?? 'Manual',
                        'ac' => $car['ac'] ?? 'Yes',
                        'quantity' => 1,
                        'base_price' => $markedUpRate,
                        'total_price' => $markedUpTotal,
                        'image_path' => $car['image_path'] ?? '/images/generic_car.jpg',
                        'is_partner' => true,
                        'is_affiliate' => (bool) ($partner->is_affiliate || !empty($car['is_affiliate'])),
                        'affiliate_url' => $car['affiliate_url'] ?? ($partner->affiliate_url ?: $partner->api_url),
                        'partner_name' => $partner->name,
                        'partner_id' => $partner->id,
                        'partner_vehicle_id' => $car['vehicle_id'],
                        'company_name' => $companyName,
                        'company_logo' => $companyLogo,
                        'company_rating' => $companyRating,
                    ];
                }
            } catch (\Exception $e) {
                // Silently log the warning so that a single down partner doesn't crash the homepage
                Log::warning("Could not fetch cars from partner '{$partner->name}': " . $e->getMessage());
            }
        }

        return $allPartnerCars;
    }

    /**
     * Forward a booking creation request to the partner API.
     */
    public static function forwardBookingToPartner(PartnerSite $partner, array $bookingData)
    {
        if (str_contains($partner->api_url, 'localhost:8000') || str_contains($partner->api_url, '127.0.0.1:8000')) {
            // Loopback override: Return success immediately to avoid locking the single PHP server thread
            return [
                'status' => 'success',
                'reservation_status' => 'Confirmed',
                'total_price' => $bookingData['total_price'] ?? 1000
            ];
        }

        try {
            $url = rtrim($partner->api_url, '/') . "/booking";

            $response = Http::timeout(4)
                ->withHeaders([
                    'X-API-KEY' => $partner->api_key,
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ])
                ->post($url, [
                    'vehicle_id' => $bookingData['partner_vehicle_id'],
                    'customer_name' => $bookingData['customer_name'],
                    'customer_email' => $bookingData['customer_email'],
                    'customer_phone' => $bookingData['customer_phone'],
                    'pickup_date' => $bookingData['pickup_datetime'],
                    'return_date' => $bookingData['return_datetime'],
                    'source' => url('/'),
                ]);

            if ($response->successful()) {
                return $response->json();
            }

            Log::error("Partner booking forward failed for '{$partner->name}': " . $response->body());
            return null;
        } catch (\Exception $e) {
            Log::error("Error forwarding booking to partner '{$partner->name}': " . $e->getMessage());
            return null;
        }
    }
}
