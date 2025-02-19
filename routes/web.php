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

// Manage Listings

Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// Show Create Form

Route::get('/create', [ListingController::class, 'create'])->middleware('auth');

// Store Listing

Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Show Edit Form

Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Update Listing

Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Single Listing: route needs to be after /listings/* routes with parameters

Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Delete Listing

Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Show Register Form

Route::get('/register', [UserController::class, 'create'])->middleware(middleware: 'guest');

// Store User

Route::post('/users', [UserController::class, 'store'])->middleware(middleware: 'guest');

// Show Login Form

Route::get('/login', [UserController::class, 'loginForm'])->name('login')->middleware('guest');

// Log User In

Route::post('/login', [UserController::class, 'login'])->middleware(middleware: 'guest');

// Log User Out

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');


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