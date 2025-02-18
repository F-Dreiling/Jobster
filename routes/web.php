<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// index: show all listings
// show: show single listing
// create: show form to create new listing
// store: store new listing
// edit: show form to update listing
// update: update listing
// destroy: delete listing

// All Listings

Route::get('/', [ListingController::class, 'index']);

// Show Create Form

Route::get('/create', [ListingController::class, 'create']);

// Store Listing

Route::post('/listings', [ListingController::class, 'store']);

// Show Edit Form

Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

// Update Listing

Route::put('/listings/{listing}', [ListingController::class, 'update']);

// Single Listing: route needs to be after /listings/* routes with parameters

Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Delete Listing

Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);

// Show Register Form

Route::get('/register', [UserController::class, 'create']);

// Store User

Route::post('/users', [UserController::class, 'store']);

// Show Login Form

Route::get('/login', [UserController::class, 'login-form']);

// Log User In

Route::post('/login', [UserController::class, 'login']);

// Log User Out

Route::post('/logout', [UserController::class, 'logout']);


// Not Used

Route::get('/hello', function () {
    return response('<h1>Hello Dude</h1>', 200)
            ->header('Content-Type', 'text/html')
            ->header('foo', 'bar');
});

Route::get('/tests/{id}', function($id) {
    //dd($id);
    //ddd($id);
    return response('Test '. $id);
})->where('id', '[0-9]+');

Route::get('/test', function(Request $request) {
    return $request->name . ' ' . $request->city;
});