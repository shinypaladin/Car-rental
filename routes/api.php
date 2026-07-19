<?php

use App\Http\Controllers\OtaApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

use App\Http\Middleware\CheckApiKey;

Route::middleware([CheckApiKey::class])->group(function () {
    Route::get('/availability', [OtaApiController::class, 'checkAvailability']);
    Route::post('/booking', [OtaApiController::class, 'createBooking']);
});
