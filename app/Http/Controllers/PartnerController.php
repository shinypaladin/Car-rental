<?php

namespace App\Http\Controllers;

use App\Models\PartnerSite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PartnerController extends Controller
{
    /**
     * Fetch all unique brands/companies directly from the partner site availability API.
     */
    public function fetchCompanies($locale, $id)
    {
        $partner = PartnerSite::findOrFail($id);
        
        $companies = [];
        $brands = [];

        try {
            if (str_contains($partner->api_url, 'localhost:8000') || str_contains($partner->api_url, '127.0.0.1:8000')) {
                // Simulate local companies (suppliers) and brands
                $companies[] = 'Car Airport Morocco';
                $localCars = \App\Models\Car::all();
                foreach ($localCars as $lc) {
                    $brands[] = trim($lc->brand);
                }
            } else {
                // Fetch list using generic date search
                $pickupDate = now()->addDay()->toDateTimeString();
                $returnDate = now()->addDays(5)->toDateTimeString();
                $url = rtrim($partner->api_url, '/') . "/availability?pickup_date=" . urlencode($pickupDate) . "&return_date=" . urlencode($returnDate);
                
                $response = Http::timeout(2)
                    ->withHeaders([
                        'X-API-KEY' => $partner->api_key,
                        'Accept' => 'application/json',
                    ])
                    ->get($url);

                if ($response->successful()) {
                    $data = $response->json();
                    $vehicles = $data['vehicles'] ?? [];
                    foreach ($vehicles as $v) {
                        $companies[] = trim($v['company_name'] ?? $partner->name);
                        if (isset($v['brand'])) {
                            $brands[] = trim($v['brand']);
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            // silent catch
        }

        // Include saved entries
        if (!empty($partner->allowed_companies)) {
            $companies = array_merge($companies, $partner->allowed_companies);
        }
        if (!empty($partner->allowed_brands)) {
            $brands = array_merge($brands, $partner->allowed_brands);
        }

        $uniqueCompanies = array_values(array_unique(array_filter($companies)));
        $uniqueBrands = array_values(array_unique(array_filter($brands)));

        return response()->json([
            'status' => 'success',
            'companies' => $uniqueCompanies,
            'brands' => $uniqueBrands,
        ]);
    }
}
