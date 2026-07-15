<?php

use App\Http\Controllers\OtaApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::get('/availability', [OtaApiController::class, 'checkAvailability']);
Route::post('/booking', [OtaApiController::class, 'createBooking']);
