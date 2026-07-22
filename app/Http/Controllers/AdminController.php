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
    public function index(Request $request, $locale = 'en')
    {
        // ── Global month filter ────────────────────────────────────────────────
        $selectedMonth = $request->get('month', Carbon::now()->format('Y-m'));
        try {
            $filterDate = Carbon::createFromFormat('Y-m', $selectedMonth)->startOfMonth();
        } catch (\Exception $e) {
            $filterDate = Carbon::now()->startOfMonth();
            $selectedMonth = $filterDate->format('Y-m');
        }

        // Month options: 1 past month, current, 6 future (8 total)
        $monthOptions = [];
        for ($i = -1; $i <= 6; $i++) {
            $m = Carbon::now()->startOfMonth()->addMonths($i);
            $monthOptions[] = [
                'value'    => $m->format('Y-m'),
                'label'    => $m->format('M Y'),
                'selected' => $m->format('Y-m') === $selectedMonth,
            ];
        }

        // ── Fleet & bookings ──────────────────────────────────────────────────
        $cars = Car::all();

        // All bookings (for reservation log - full history)
        $bookings = Booking::with('car')->orderBy('created_at', 'desc')->get();

        // Month-filtered bookings (for stats)
        $monthBookings = Booking::with('car')
            ->whereMonth('pickup_datetime', $filterDate->month)
            ->whereYear('pickup_datetime', $filterDate->year)
            ->orderBy('pickup_datetime', 'desc')
            ->get();

        $seasonalPrices = SeasonalPrice::with('car')->orderBy('start_date', 'asc')->get();

        // ── Visitor stats ─────────────────────────────────────────────────────
        $visits24h = \App\Models\PageVisit::where('visited_at', '>=', now()->subDay())->count();
        $visits7d  = \App\Models\PageVisit::where('visited_at', '>=', now()->subDays(7))->count();
        $visits30d = \App\Models\PageVisit::where('visited_at', '>=', now()->subDays(30))->count();

        $topCountries = \App\Models\PageVisit::select('country', \DB::raw('count(*) as count'))
            ->groupBy('country')
            ->orderBy('count', 'desc')
            ->limit(5)
            ->get();

        $allVisits = \App\Models\PageVisit::orderBy('visited_at', 'desc')->limit(200)->get();

        // ── Expenses ─────────────────────────────────────────────────────────
        $expenses = \App\Models\Expense::orderBy('spent_at', 'desc')->get();

        // Automated fixed monthly expenses (loan + insurance per car * qty)
        $automatedExpensesSum = $cars->sum(function ($car) {
            return ($car->loan_cost + $car->insurance_cost) * $car->quantity;
        });

        // Manual expenses for the selected month (one-time matching month/year, plus recurring active at/before selected month)
        $monthManualExpenses = \App\Models\Expense::where(function ($q) use ($filterDate) {
            $q->where('is_recurring', false)
              ->whereMonth('spent_at', $filterDate->month)
              ->whereYear('spent_at', $filterDate->year);
        })->orWhere(function ($q) use ($filterDate) {
            $q->where('is_recurring', true)
              ->where('spent_at', '<=', $filterDate->endOfMonth());
        })->sum('amount');

        $totalMonthlyExpenses = $automatedExpensesSum + $monthManualExpenses;

        // ── Per-month revenue breakdown (for multi-month selector) ────────────
        $revenueByMonth = [];
        for ($i = -1; $i <= 6; $i++) {
            $m = Carbon::now()->startOfMonth()->addMonths($i);
            $rev = Booking::where('status', 'confirmed')
                ->whereMonth('pickup_datetime', $m->month)
                ->whereYear('pickup_datetime', $m->year)
                ->sum('total_price');
            $manualExp = \App\Models\Expense::where(function ($q) use ($m) {
                $q->where('is_recurring', false)
                  ->whereMonth('spent_at', $m->month)
                  ->whereYear('spent_at', $m->year);
            })->orWhere(function ($q) use ($m) {
                $q->where('is_recurring', true)
                  ->where('spent_at', '<=', $m->endOfMonth());
            })->sum('amount');
            $revenueByMonth[] = [
                'label'    => $m->format('M Y'),
                'month'    => $m->format('Y-m'),
                'revenue'  => (float) $rev,
                'expenses' => (float) ($automatedExpensesSum + $manualExp),
                'net'      => (float) ($rev - $automatedExpensesSum - $manualExp),
                'bookings' => Booking::where('status', 'confirmed')
                    ->whereMonth('pickup_datetime', $m->month)
                    ->whereYear('pickup_datetime', $m->year)->count(),
                'pending'  => Booking::where('status', 'pending')
                    ->whereMonth('pickup_datetime', $m->month)
                    ->whereYear('pickup_datetime', $m->year)->count(),
            ];
        }

        // Filtered stats for the selected month (used by stat cards)
        $selectedMonthData = collect($revenueByMonth)
            ->firstWhere('month', $selectedMonth)
            ?? $revenueByMonth[1]; // fallback to current month

        // Optional Extras
        $extras = \App\Models\Extra::all();

        // Contact Requests
        $contactRequests = \App\Models\ContactRequest::orderBy('created_at', 'desc')->get();

        // API Keys
        $apiKeys = \App\Models\ApiKey::orderBy('created_at', 'desc')->get();

        // Partner Sites
        $partnerSites = \App\Models\PartnerSite::orderBy('created_at', 'desc')->get();

        // Blog Posts
        $blogPosts = \App\Models\BlogPost::orderBy('created_at', 'desc')->get();

        return view('admin.dashboard', compact(
            'cars', 'bookings', 'monthBookings', 'seasonalPrices', 'locale',
            'visits24h', 'visits7d', 'visits30d', 'totalMonthlyExpenses',
            'topCountries', 'allVisits', 'expenses', 'automatedExpensesSum',
            'revenueByMonth', 'extras', 'contactRequests', 'apiKeys', 'partnerSites',
            'blogPosts',
            'selectedMonth', 'selectedMonthData', 'monthOptions', 'filterDate'
        ));
    }

    /**
     * Show admin login page.
     */
    public function showLogin($locale = 'en')
    {
        if (session('admin_logged_in')) {
            return redirect()->route('admin.dashboard', ['locale' => $locale]);
        }
        return view('admin.login', compact('locale'));
    }

    /**
     * Handle login post request.
     */
    public function login(Request $request, $locale = 'en')
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($request->username === 'admin' && $request->password === '123456') {
            session(['admin_logged_in' => true]);
            return redirect()->route('admin.dashboard', ['locale' => $locale])->with('success', 'Logged in successfully.');
        }

        return back()->with('error', 'Invalid username or password.');
    }

    /**
     * Handle logout.
     */
    public function logout(Request $request, $locale = 'en')
    {
        session()->forget('admin_logged_in');
        return redirect()->route('admin.login', ['locale' => $locale])->with('success', 'Logged out successfully.');
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
            'model_year' => 'nullable|integer',
            'model_month' => 'nullable|integer',
            'loan_cost' => 'nullable|numeric',
            'insurance_cost' => 'nullable|numeric',
            'maintenance_cost' => 'nullable|numeric',
            'fuel_cost' => 'nullable|numeric',
            'other_cost' => 'nullable|numeric',
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
            'display_order' => $request->input('display_order', 99),
            'model_year' => $request->model_year,
            'model_month' => $request->model_month,
            'image_path' => $request->image_path ?: '/images/default.jpg',
            'video_path' => $request->video_path ?: null,
            'loan_cost' => $request->loan_cost ?: 0,
            'insurance_cost' => $request->insurance_cost ?: 0,
            'maintenance_cost' => $request->maintenance_cost ?: 0,
            'fuel_cost' => $request->fuel_cost ?: 0,
            'other_cost' => $request->other_cost ?: 0,
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
            'brand'             => $request->brand,
            'model'             => $request->model,
            'category'          => $request->category,
            'seats'             => $request->seats,
            'transmission'      => $request->transmission,
            'ac'                => $request->has('ac'),
            'quantity'          => $request->quantity,
            'allow_overbooking' => $request->has('allow_overbooking'),
            'base_price'        => $request->base_price,
            'display_order'     => $request->input('display_order', 99),
            'model_year'        => $request->model_year,
            'model_month'       => $request->model_month,
            'image_path'        => $request->image_path ?: $car->image_path,
            'video_path'        => $request->video_path ?: $car->video_path,
            'loan_cost'         => $request->loan_cost ?: 0,
            'insurance_cost'    => $request->insurance_cost ?: 0,
            'maintenance_cost'  => $request->maintenance_cost ?: 0,
            'fuel_cost'         => $request->fuel_cost ?: 0,
            'other_cost'        => $request->other_cost ?: 0,
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
     * Create a manual booking from the admin panel.
     */
    public function storeManualBooking(Request $request, $locale = 'en')
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'customer_name' => 'required|string',
            'customer_email' => 'nullable|email',
            'customer_phone' => 'required|string',
            'pickup_location' => 'required|string',
            'return_location' => 'required|string',
            'pickup_datetime' => 'required|date',
            'return_datetime' => 'required|date|after:pickup_datetime',
            'total_price' => 'required|numeric',
            'source' => 'required|string|in:website,whatsapp,ota',
            'status' => 'required|string|in:pending,confirmed,cancelled',
            'extras' => 'nullable|array',
        ]);

        Booking::create([
            'booking_reference' => Booking::generateReference(),
            'car_id' => $request->car_id,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'pickup_location' => $request->pickup_location,
            'return_location' => $request->return_location,
            'pickup_datetime' => Carbon::parse($request->pickup_datetime),
            'return_datetime' => Carbon::parse($request->return_datetime),
            'total_price' => $request->total_price,
            'status' => $request->status,
            'source' => $request->source,
            'extras' => $request->input('extras', []),
        ]);

        return redirect()->route('admin.dashboard', ['locale' => $locale])->with('success', 'Manual booking added successfully.');
    }

    /**
     * Store a manual expense entry.
     */
    public function storeExpense(Request $request, $locale = 'en')
    {
        $request->validate([
            'description' => 'required|string',
            'category' => 'required|string|in:loan,insurance,maintenance,fuel,other',
            'amount' => 'required|numeric',
            'spent_at' => 'required|date',
            'is_recurring' => 'nullable',
        ]);

        \App\Models\Expense::create([
            'description' => $request->description,
            'category' => $request->category,
            'amount' => $request->amount,
            'is_recurring' => $request->has('is_recurring'),
            'spent_at' => Carbon::parse($request->spent_at),
        ]);

        return redirect()->route('admin.dashboard', ['locale' => $locale])->with('success', 'Expense logged successfully.');
    }

    /**
     * Delete an expense entry.
     */
    public function deleteExpense($locale = 'en', $id)
    {
        $expense = \App\Models\Expense::findOrFail($id);
        $expense->delete();

        return redirect()->route('admin.dashboard', ['locale' => $locale])->with('success', 'Expense deleted successfully.');
    }

    /**
     * Delete a contact request.
     */
    public function deleteContactRequest($locale = 'en', $id)
    {
        $contact = \App\Models\ContactRequest::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.dashboard', ['locale' => $locale])->with('success', 'Contact request deleted successfully.');
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
            'min_days' => 'nullable|integer|min:1',
        ]);

        SeasonalPrice::create([
            'car_id' => $request->car_id ?: null, // null for all cars
            'name' => $request->name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'adjustment_type' => $request->adjustment_type,
            'value' => $request->value,
            'min_days' => $request->filled('min_days') ? intval($request->min_days) : 1,
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
        $carIdInput = $request->input('car_id');
        $isPartnerBooking = is_string($carIdInput) && str_starts_with($carIdInput, 'partner_');

        if ($isPartnerBooking) {
            $request->validate([
                'car_id' => 'required|string',
                'customer_name' => 'required|string',
                'customer_email' => 'required|email',
                'customer_phone' => 'required|string',
                'pickup_location_val' => 'required|string',
                'return_location_val' => 'nullable|string',
                'pickup_datetime_val' => 'required|string',
                'return_datetime_val' => 'required|string',
                'extras' => 'nullable|array',
                'flight_number' => 'nullable|string|max:50',
            ]);

            // Parse ID: partner_{partner_id}_{partner_vehicle_id}
            $parts = explode('_', $carIdInput);
            $partnerId = $parts[1] ?? null;
            $partnerVehicleId = $parts[2] ?? null;

            $partner = \App\Models\PartnerSite::findOrFail($partnerId);
            $pickupDt = Carbon::parse($request->pickup_datetime_val);
            $returnDt = Carbon::parse($request->return_datetime_val);

            // Re-fetch partner pricing to confirm rate and avoid tampering
            $partnerCars = \App\Helpers\PartnerAggregator::fetchPartnerCars($pickupDt->toDateTimeString(), $returnDt->toDateTimeString());
            $matchedCar = collect($partnerCars)->firstWhere('partner_vehicle_id', $partnerVehicleId);

            if (!$matchedCar) {
                return back()->with('error', 'Sorry, this partner vehicle is no longer available.');
            }

            // Forward reservation details to partner API
            $forwardResult = \App\Helpers\PartnerAggregator::forwardBookingToPartner($partner, [
                'partner_vehicle_id' => $partnerVehicleId,
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'customer_phone' => $request->customer_phone,
                'pickup_datetime' => $pickupDt->toDateTimeString(),
                'return_datetime' => $returnDt->toDateTimeString(),
                'flight_number' => $request->flight_number,
            ]);

            if (!$forwardResult || ($forwardResult['status'] ?? 'error') !== 'success') {
                return back()->with('error', 'Could not confirm reservation with our partner. Please try again.');
            }

            // Save booking in local DB to keep track of it
            $booking = Booking::create([
                'booking_reference' => Booking::generateReference(),
                'car_id' => null, // null for external partner car
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'customer_phone' => $request->customer_phone,
                'pickup_location' => $request->pickup_location_val,
                'return_location' => $request->return_location_val ?? $request->pickup_location_val,
                'flight_number' => $request->flight_number ? strtoupper(trim($request->flight_number)) : null,
                'pickup_datetime' => $pickupDt,
                'return_datetime' => $returnDt,
                'total_price' => $matchedCar['total_price'],
                'status' => 'confirmed', // confirmed because partner site approved it
                'source' => $partner->name . ' (Partner)',
                'extras' => $request->input('extras', []),
            ]);

            // Send confirmation email
            try {
                \Illuminate\Support\Facades\Mail::to($booking->customer_email)
                    ->send(new \App\Mail\BookingConfirmationMail($booking));
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error("Failed to send booking confirmation email for partner: " . $e->getMessage());
            }

            // Format WhatsApp text for partner booking
            $partnerMsg = "Hello Car Airport Morocco! 🚗\n";
            $partnerMsg .= "I would like to confirm my partner reservation request.\n\n";
            $partnerMsg .= "Booking Ref: *" . $booking->booking_reference . "*\n";
            $partnerMsg .= "Name: " . $booking->customer_name . "\n";
            $partnerMsg .= "Phone: " . $booking->customer_phone . "\n";
            $partnerMsg .= "Car: " . $matchedCar['brand'] . " " . $matchedCar['model'] . "\n";
            $partnerMsg .= "Pickup: " . $booking->pickup_location . " (" . $booking->pickup_datetime->format('Y-m-d H:i') . ")\n";
            $partnerMsg .= "Return: " . $booking->return_location . " (" . $booking->return_datetime->format('Y-m-d H:i') . ")\n";
            if ($booking->flight_number) {
                $partnerMsg .= "Flight Number: *" . $booking->flight_number . "*\n";
            }
            $partnerMsg .= "Total Price: *" . $booking->total_price . " DH*\n\n";
            $partnerMsg .= "Please let me know how to proceed. Thank you!";
            $whatsappUrl = "https://wa.me/212600988632?text=" . urlencode($partnerMsg);

            return redirect()->route('home', ['locale' => $locale])
                ->with('success', 'Booking requested successfully! Partner Reference: ' . $booking->booking_reference)
                ->with('whatsapp_redirect_url', $whatsappUrl)
                ->with('last_booking_reference', $booking->booking_reference)
                ->with('last_booking_car_name', $matchedCar['brand'] . ' ' . $matchedCar['model']);
        }

        // Local car booking validation and process
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'customer_name' => 'required|string',
            'customer_email' => 'required|email',
            'customer_phone' => 'required|string',
            'pickup_location_val' => 'required|string',
            'return_location_val' => 'nullable|string',
            'pickup_datetime_val' => 'required|string',
            'return_datetime_val' => 'required|string',
            'extras' => 'nullable|array',
            'flight_number' => 'nullable|string|max:50',
        ]);

        $car = Car::findOrFail($carIdInput);
        
        $pickupDt = Carbon::parse($request->pickup_datetime_val);
        $returnDt = Carbon::parse($request->return_datetime_val);

        // Check availability strictly if overbooking is not allowed
        $availableCount = $car->getAvailableCountForRange($pickupDt, $returnDt);
        
        if ($availableCount <= 0 && !$car->allow_overbooking) {
            return back()->with('error', 'Sorry, this car is fully booked for the selected dates.');
        }

        // Calculate Pricing
        $selectedExtras = $request->input('extras', []);
        $pricing = \App\Helpers\PricingEngine::calculatePrice($car, $pickupDt, $returnDt, $selectedExtras);

        // Save Booking
        $booking = Booking::create([
            'booking_reference' => Booking::generateReference(),
            'car_id' => $car->id,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'pickup_location' => $request->pickup_location_val,
            'return_location' => $request->return_location_val ?? $request->pickup_location_val,
            'flight_number' => $request->flight_number ? strtoupper(trim($request->flight_number)) : null,
            'pickup_datetime' => $pickupDt,
            'return_datetime' => $returnDt,
            'total_price' => $pricing['total_price'],
            'status' => 'pending',
            'source' => 'website',
            'extras' => $selectedExtras,
        ]);

        // Send confirmation email
        try {
            \Illuminate\Support\Facades\Mail::to($booking->customer_email)
                ->send(new \App\Mail\BookingConfirmationMail($booking));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error("Failed to send booking confirmation email: " . $e->getMessage());
        }

        $localMsg = "Hello Car Airport Morocco! 🚗\n";
        $localMsg .= "I would like to confirm my reservation request.\n\n";
        $localMsg .= "Booking Ref: *" . $booking->booking_reference . "*\n";
        $localMsg .= "Name: " . $booking->customer_name . "\n";
        $localMsg .= "Phone: " . $booking->customer_phone . "\n";
        $localMsg .= "Car: " . $car->brand . " " . $car->model . "\n";
        $localMsg .= "Pickup: " . $booking->pickup_location . " (" . $pickupDt->format('Y-m-d H:i') . ")\n";
        $localMsg .= "Return: " . $booking->return_location . " (" . $returnDt->format('Y-m-d H:i') . ")\n";
        if ($booking->flight_number) {
            $localMsg .= "Flight Number: *" . $booking->flight_number . "*\n";
        }
        if (!empty($selectedExtras)) {
            $localMsg .= "Extras: " . implode(', ', $selectedExtras) . "\n";
        }
        $localMsg .= "Total Price: *" . $booking->total_price . " DH*\n\n";
        $localMsg .= "Please let me know how to proceed. Thank you!";
        $whatsappUrl = "https://wa.me/212600988632?text=" . urlencode($localMsg);

        return redirect()->route('home', ['locale' => $locale])
            ->with('success', 'Booking requested successfully! Reference: ' . $booking->booking_reference)
            ->with('whatsapp_redirect_url', $whatsappUrl)
            ->with('last_booking_reference', $booking->booking_reference)
            ->with('last_booking_car_name', $car->brand . ' ' . $car->model);
    }

    /**
     * Update an existing booking from the admin panel.
     */
    public function updateBooking(Request $request, $locale = 'en', $id)
    {
        $booking = Booking::findOrFail($id);

        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'customer_name' => 'required|string',
            'customer_email' => 'nullable|email',
            'customer_phone' => 'required|string',
            'pickup_location' => 'required|string',
            'return_location' => 'required|string',
            'pickup_datetime' => 'required|date',
            'return_datetime' => 'required|date|after:pickup_datetime',
            'total_price' => 'required|numeric',
            'source' => 'required|string|in:website,whatsapp,ota',
            'status' => 'required|string|in:pending,confirmed,cancelled',
            'extras' => 'nullable|array',
        ]);

        $booking->update([
            'car_id' => $request->car_id,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'pickup_location' => $request->pickup_location,
            'return_location' => $request->return_location,
            'pickup_datetime' => Carbon::parse($request->pickup_datetime),
            'return_datetime' => Carbon::parse($request->return_datetime),
            'total_price' => $request->total_price,
            'status' => $request->status,
            'source' => $request->source,
            'extras' => $request->input('extras', []),
        ]);

        return redirect()->route('admin.dashboard', ['locale' => $locale])->with('success', 'Booking updated successfully.');
    }

    /**
     * Store a new optional extra.
     */
    public function storeExtra(Request $request, $locale = 'en')
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:extras,slug|max:255',
            'price' => 'required|numeric|min:0',
            'type' => 'required|string|in:per_day,flat',
            'description' => 'nullable|string',
        ]);

        \App\Models\Extra::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'price' => $request->price,
            'type' => $request->type,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.dashboard', ['locale' => $locale])->with('success', 'Optional extra added successfully.');
    }

    /**
     * Update an optional extra.
     */
    public function updateExtra(Request $request, $locale = 'en', $id)
    {
        $extra = \App\Models\Extra::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:extras,slug,' . $id,
            'price' => 'required|numeric|min:0',
            'type' => 'required|string|in:per_day,flat',
            'description' => 'nullable|string',
        ]);

        $extra->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'price' => $request->price,
            'type' => $request->type,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.dashboard', ['locale' => $locale])->with('success', 'Optional extra updated successfully.');
    }

    /**
     * Delete an optional extra.
     */
    public function deleteExtra($locale = 'en', $id)
    {
        $extra = \App\Models\Extra::findOrFail($id);
        $extra->delete();

        return redirect()->route('admin.dashboard', ['locale' => $locale])->with('success', 'Optional extra deleted successfully.');
    }

    public function generateApiKey(Request $request, $locale = 'en')
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'discount_percent' => 'nullable|numeric|min:0|max:100',
        ]);

        $token = 'cap_' . bin2hex(random_bytes(24));

        \App\Models\ApiKey::create([
            'name' => $request->name,
            'key' => $token,
            'active' => true,
            'discount_percent' => $request->input('discount_percent', 0.00) ?: 0.00,
        ]);

        return redirect()->route('admin.dashboard', ['locale' => $locale])->with('success', 'API Key generated successfully.');
    }

    /**
     * Update an existing API key.
     */
    public function updateApiKey(Request $request, $locale = 'en', $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'discount_percent' => 'required|numeric|min:0|max:100',
        ]);

        $apiKey = \App\Models\ApiKey::findOrFail($id);
        $apiKey->update([
            'name' => $request->name,
            'discount_percent' => $request->discount_percent,
        ]);

        return redirect()->route('admin.dashboard', ['locale' => $locale])->with('success', 'API Key updated successfully.');
    }

    /**
     * Revoke / Delete an API key.
     */
    public function revokeApiKey($locale = 'en', $id)
    {
        $apiKey = \App\Models\ApiKey::findOrFail($id);
        $apiKey->delete();

        return redirect()->route('admin.dashboard', ['locale' => $locale])->with('success', 'API Key revoked successfully.');
    }

    /**
     * Store a new partner site.
     */
    public function storePartnerSite(Request $request, $locale = 'en')
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'api_url' => 'required|url|max:255',
            'api_key' => 'required|string|max:255',
            'markup_percent' => 'required|numeric|min:0|max:100',
            'min_rating' => 'nullable|numeric|min:0|max:10',
        ]);

        $categoryMarkups = [
            'Economy' => (float) $request->input('markup_economy', $request->markup_percent),
            'SUV'     => (float) $request->input('markup_suv', $request->markup_percent),
            'Van'     => (float) $request->input('markup_van', $request->markup_percent),
            'Luxury'  => (float) $request->input('markup_luxury', $request->markup_percent),
        ];

        // Format allowed companies and brands array lists
        $allowed = null;
        if ($request->has('allowed_companies_csv')) {
            $allowed = array_filter(array_map('trim', explode(',', $request->allowed_companies_csv)));
        }
        $allowedBrands = null;
        if ($request->has('allowed_brands_csv')) {
            $allowedBrands = array_filter(array_map('trim', explode(',', $request->allowed_brands_csv)));
        }

        \App\Models\PartnerSite::create([
            'name'             => $request->name,
            'api_url'          => $request->api_url,
            'api_key'          => $request->api_key,
            'markup_percent'   => $request->markup_percent,
            'active'           => true,
            'is_affiliate'     => $request->has('is_affiliate'),
            'affiliate_url'    => $request->affiliate_url,
            'display_order'    => $request->input('display_order', 99),
            'category_markups' => $categoryMarkups,
            'allowed_companies'=> $allowed,
            'allowed_brands'   => $allowedBrands,
            'min_rating'       => $request->filled('min_rating') ? (float) $request->min_rating : 7.0,
        ]);

        return redirect()->route('admin.dashboard', ['locale' => $locale])->with('success', 'Partner site added successfully.');
    }

    /**
     * Update an existing partner site.
     */
    public function updatePartnerSite(Request $request, $locale = 'en', $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'api_url' => 'required|url|max:255',
            'api_key' => 'required|string|max:255',
            'markup_percent' => 'required|numeric|min:0|max:100',
            'min_rating' => 'nullable|numeric|min:0|max:10',
            'affiliate_url' => 'nullable|url|max:255',
        ]);

        $categoryMarkups = [
            'Economy' => (float) $request->input('markup_economy', $request->markup_percent),
            'SUV'     => (float) $request->input('markup_suv', $request->markup_percent),
            'Van'     => (float) $request->input('markup_van', $request->markup_percent),
            'Luxury'  => (float) $request->input('markup_luxury', $request->markup_percent),
        ];

        $allowed = null;
        if ($request->has('allowed_companies_csv')) {
            $allowed = array_filter(array_map('trim', explode(',', $request->allowed_companies_csv)));
        }
        $allowedBrands = null;
        if ($request->has('allowed_brands_csv')) {
            $allowedBrands = array_filter(array_map('trim', explode(',', $request->allowed_brands_csv)));
        }

        $partner = \App\Models\PartnerSite::findOrFail($id);
        $partner->update([
            'name'             => $request->name,
            'api_url'          => $request->api_url,
            'api_key'          => $request->api_key,
            'markup_percent'   => $request->markup_percent,
            'is_affiliate'     => $request->has('is_affiliate'),
            'affiliate_url'    => $request->affiliate_url,
            'display_order'    => $request->input('display_order', 99),
            'category_markups' => $categoryMarkups,
            'allowed_companies'=> $allowed,
            'allowed_brands'   => $allowedBrands,
            'min_rating'       => $request->filled('min_rating') ? (float) $request->min_rating : null,
        ]);

        return redirect()->route('admin.dashboard', ['locale' => $locale])->with('success', 'Partner site updated successfully.');
    }

    /**
     * Delete a partner site configuration.
     */
    public function deletePartnerSite($locale = 'en', $id)
    {
        $partner = \App\Models\PartnerSite::findOrFail($id);
        $partner->delete();

        return redirect()->route('admin.dashboard', ['locale' => $locale])->with('success', 'Partner site removed successfully.');
    }

    /**
     * Store new Blog Post.
     */
    public function storeBlogPost(Request $request, $locale = 'en')
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $slug = \Illuminate\Support\Str::slug($request->title);
        $originalSlug = $slug;
        $count = 1;
        while (\App\Models\BlogPost::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        \App\Models\BlogPost::create([
            'title' => $request->title,
            'slug' => $slug,
            'locale' => $request->input('locale', $locale),
            'category' => $request->input('category', 'Travel Guide'),
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'featured_image' => $request->featured_image,
            'author' => $request->input('author', 'Car Airport Morocco Team'),
            'read_time_minutes' => $request->input('read_time_minutes', 5),
            'meta_title' => $request->meta_title ?: $request->title,
            'meta_description' => $request->meta_description ?: $request->excerpt,
            'meta_keywords' => $request->meta_keywords,
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('admin.dashboard', ['locale' => $locale])->with('success', 'Blog post created successfully.');
    }

    /**
     * Update existing Blog Post.
     */
    public function updateBlogPost(Request $request, $locale = 'en', $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = \App\Models\BlogPost::findOrFail($id);

        $post->update([
            'title' => $request->title,
            'locale' => $request->input('locale', $locale),
            'category' => $request->input('category', 'Travel Guide'),
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'featured_image' => $request->featured_image,
            'author' => $request->input('author', 'Car Airport Morocco Team'),
            'read_time_minutes' => $request->input('read_time_minutes', 5),
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('admin.dashboard', ['locale' => $locale])->with('success', 'Blog post updated successfully.');
    }

    /**
     * Delete Blog Post.
     */
    public function deleteBlogPost($locale = 'en', $id)
    {
        $post = \App\Models\BlogPost::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.dashboard', ['locale' => $locale])->with('success', 'Blog post deleted successfully.');
    }
}
