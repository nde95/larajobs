<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

// create listing form
Route::get('/listings/create', [ListingController::class, 'create']);

// store newly created listing
Route::post('/listings', [ListingController::class, 'store']);

// get listing and populate edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

// update listing with submission
Route::put('/listings/{listing}', [ListingController::class, 'update']);

// delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);

// search listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// register user form
Route::get('/register', [UserController::class, 'create']);

// create new user
Route::post('/users', [UserController::class, 'store']);

// log user out
Route::post('/logout', [UserController::class, 'logout']);

// login user form
Route::get('/login', [UserController::class, 'login']);

// log user in
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
