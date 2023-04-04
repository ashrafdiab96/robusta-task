<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\City\CityController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\Trip\TripController;
use App\Http\Controllers\Admin\Trip\TripStopController;
use App\Http\Controllers\Admin\Bus\BusController;
use App\Http\Controllers\Admin\Bus\SeatController;
use App\Http\Controllers\Admin\Booking\BookingController;
use App\Http\Controllers\Client\Auth\AuthController;
use App\Http\Controllers\Client\Booking\BookingController as ClientBookingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// AUTH ROUTES
Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    /* CLIENT ROUTES */
    // PROFILE ROUTES
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::put('/profile/update', [AuthController::class, 'update']);
    Route::put('/profile/updatePassword', [AuthController::class, 'updatePassword']);
    Route::delete('/profile/delete', [AuthController::class, 'delete']);

    // BOOKINGS ROUTES
    Route::get('/book/me/getAll', [ClientBookingController::class, 'getAll']);
    Route::get('/book/me/getPaginate', [ClientBookingController::class, 'getPaginate']);
    Route::get('/book/me/get/{id}', [ClientBookingController::class, 'get']);
    Route::post('/book/me/create', [ClientBookingController::class, 'create']);
    Route::put('/book/me/update/{id}', [ClientBookingController::class, 'update']);
    Route::delete('/book/me/delete/{id}', [ClientBookingController::class, 'delete']);

    /* ADMIN ROUTES */
    Route::middleware('is_admin')->group(function() {
        // CITY ROUTES
        Route::get('/city/getAll', [CityController::class, 'getAll']);
        Route::get('/city/getPaginate', [CityController::class, 'getPaginate']);
        Route::get('/city/get/{id}', [CityController::class, 'get']);
        Route::post('/city/create', [CityController::class, 'create']);
        Route::put('/city/update/{id}', [CityController::class, 'update']);
        Route::delete('/city/delete/{id}', [CityController::class, 'delete']);

        // USER ROUTES
        Route::get('/user/getAll', [UserController::class, 'getAll']);
        Route::get('/user/getPaginate', [UserController::class, 'getPaginate']);
        Route::get('/user/get/{id}', [UserController::class, 'get']);
        Route::post('/user/create', [UserController::class, 'create']);
        Route::put('/user/update/{id}', [UserController::class, 'update']);
        Route::delete('/user/delete/{id}', [UserController::class, 'delete']);

        // TRIPS ROUTES
        Route::get('/trip/getAll', [TripController::class, 'getAll']);
        Route::get('/trip/getPaginate', [TripController::class, 'getPaginate']);
        Route::get('/trip/get/{id}', [TripController::class, 'get']);
        Route::post('/trip/create', [TripController::class, 'create']);
        Route::put('/trip/update/{id}', [TripController::class, 'update']);
        Route::delete('/trip/delete/{id}', [TripController::class, 'delete']);

        // TRIPS STOPS ROUTES
        Route::post('/trip/stop/create', [TripStopController::class, 'create']);
        Route::put('/trip/stop/update/{id}', [TripStopController::class, 'update']);
        Route::delete('/trip/stop/delete/{id}', [TripStopController::class, 'delete']);

        // BUSES ROUTES
        Route::get('/bus/getAll', [BusController::class, 'getAll']);
        Route::get('/bus/getPaginate', [BusController::class, 'getPaginate']);
        Route::get('/bus/get/{id}', [BusController::class, 'get']);
        Route::post('/bus/create', [BusController::class, 'create']);
        Route::put('/bus/update/{id}', [BusController::class, 'update']);
        Route::delete('/bus/delete/{id}', [BusController::class, 'delete']);

        // SEATS ROUTES
        Route::get('/seat/getAll', [SeatController::class, 'getAll']);
        Route::get('/seat/getPaginate', [SeatController::class, 'getPaginate']);
        Route::get('/seat/get/{id}', [SeatController::class, 'get']);
        Route::post('/seat/create', [SeatController::class, 'create']);
        Route::put('/seat/update/{id}', [SeatController::class, 'update']);
        Route::delete('/seat/delete/{id}', [SeatController::class, 'delete']);

        // BOOKINGS ROUTES
        Route::get('/book/getAll', [BookingController::class, 'getAll']);
        Route::get('/book/getPaginate', [BookingController::class, 'getPaginate']);
        Route::get('/book/get/{id}', [BookingController::class, 'get']);
        Route::post('/book/create', [BookingController::class, 'create']);
        Route::put('/book/update/{id}', [BookingController::class, 'update']);
        Route::delete('/book/delete/{id}', [BookingController::class, 'delete']);
    });

});
