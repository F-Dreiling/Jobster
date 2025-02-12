<?php

use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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

// All Listings

Route::get('/', [ListingController::class, 'index']);

// Single Listing

Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Not Required

Route::get('/hello', function () {
    return response('<h1>Hello World</h1>', 200)
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