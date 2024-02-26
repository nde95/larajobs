<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// all listings
Route::get('/', [ListingController::class, 'index']);

// search listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);
