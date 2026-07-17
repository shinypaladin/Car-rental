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
        
        // Bookings status updates
        Route::post('/bookings/{id}/status', [AdminController::class, 'updateBookingStatus'])->name('admin.booking.status');
        
        // Manual Bookings
        Route::post('/bookings/manual', [AdminController::class, 'storeManualBooking'])->name('admin.booking.manual');

        // Expense Management
        Route::post('/expenses', [AdminController::class, 'storeExpense'])->name('admin.expense.store');
        Route::delete('/expenses/{id}', [AdminController::class, 'deleteExpense'])->name('admin.expense.delete');
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
