<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Root route: Auto-detects browser locale and redirects
Route::get('/', function (Request $request) {
    $locale = SetLocale::detectBrowserLocale($request);
    return response('', 302)->header('Location', '/' . $locale);
});

// Localized Route Group (English and French)
Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => 'en|fr'],
    'middleware' => [SetLocale::class]
], function () {
    
    // Homepage
    Route::get('/', [HomeController::class, 'index'])->name('home');
    
    // Booking Form Submission
    Route::post('/book', [AdminController::class, 'storeBooking'])->name('booking.store');

    // Public Contact Form Submission
    Route::post('/contact', [HomeController::class, 'storeContact'])->name('contact.store');

    // Public Manage Booking routes
    Route::get('/booking/retrieve', [HomeController::class, 'retrieveBooking'])->name('booking.retrieve');
    Route::get('/booking/recalculate', [HomeController::class, 'recalculatePrice'])->name('booking.recalculate');
    Route::post('/booking/update-public', [HomeController::class, 'updatePublicBooking'])->name('booking.update-public');

    // Admin Auth routes
    Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
    Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

    // Admin Dashboard Routes
    Route::prefix('admin')->middleware(['admin.auth'])->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
        
        // Fleet Manage
        Route::post('/cars', [AdminController::class, 'storeCar'])->name('admin.car.store');
        Route::post('/cars/update/{id}', [AdminController::class, 'updateCar'])->name('admin.car.update');
        Route::delete('/cars/{id}', [AdminController::class, 'deleteCar'])->name('admin.car.delete');
        
        // Seasonal Pricing Manage
        Route::post('/pricing', [AdminController::class, 'storePricing'])->name('admin.pricing.store');
        Route::delete('/pricing/{id}', [AdminController::class, 'deletePricing'])->name('admin.pricing.delete');
        
        // Bookings updates
        Route::post('/bookings/{id}/status', [AdminController::class, 'updateBookingStatus'])->name('admin.booking.status');
        Route::post('/bookings/update/{id}', [AdminController::class, 'updateBooking'])->name('admin.booking.update');
        
        // Manual Bookings
        Route::post('/bookings/manual', [AdminController::class, 'storeManualBooking'])->name('admin.booking.manual');

        // Expense Management
        Route::post('/expenses', [AdminController::class, 'storeExpense'])->name('admin.expense.store');
        Route::delete('/expenses/{id}', [AdminController::class, 'deleteExpense'])->name('admin.expense.delete');

        // Dynamic Extras Manage
        Route::post('/extras', [AdminController::class, 'storeExtra'])->name('admin.extras.store');
        Route::post('/extras/update/{id}', [AdminController::class, 'updateExtra'])->name('admin.extras.update');
        Route::delete('/extras/{id}', [AdminController::class, 'deleteExtra'])->name('admin.extras.delete');

        // Contact Requests
        Route::delete('/contact-requests/{id}', [AdminController::class, 'deleteContactRequest'])->name('admin.contact.delete');
    });

    // Web DB installer (accessible at /en/install-db or /fr/install-db)
    Route::get('/install-db', function () {
        try {
            // Run migrations
            Artisan::call('migrate:fresh', ['--force' => true]);
            // Run seeders
            Artisan::call('db:seed', ['--force' => true]);
            
            return response()->json([
                'status' => 'success',
                'message' => 'Database successfully migrated and seeded with mock cars!',
                'output' => Artisan::output()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    });
});
