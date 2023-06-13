<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes([
    'register' => false,
    'verify' => true,
    'reset' => false
]);


Route::middleware('auth')->group(function () 
{
    Route::get('/', [App\Http\Controllers\TourController::class, 'index'])->name('home');

    # tours
    Route::get('/tour/list', [App\Http\Controllers\TourController::class, 'index'])->name('tours.index');
    Route::get('/tour/create', [App\Http\Controllers\TourController::class, 'create'])->name('tours.create');
    Route::post('/tour/store', [App\Http\Controllers\TourController::class, 'store'])->name('tours.store');
    Route::get('/tour/show/{tour}', [App\Http\Controllers\TourController::class, 'show'])->name('tours.show');
    Route::get('/tour/edit/{tour}', [App\Http\Controllers\TourController::class, 'edit'])->name('tours.edit');
    Route::get('/tour/destroy/{tour}', [App\Http\Controllers\TourController::class, 'destroy'])->name('tours.destroy');
    Route::put('/tour/update/{tour}', [App\Http\Controllers\TourController::class, 'update'])->name('tours.update');
    # bikes
    Route::get('/bike/list', [App\Http\Controllers\BikeController::class, 'index'])->name('bikes.index');
    Route::get('/bike/create', [App\Http\Controllers\BikeController::class, 'create'])->name('bikes.create');
    Route::post('/bike/store', [App\Http\Controllers\BikeController::class, 'store'])->name('bikes.store');
    Route::get('/bike/show/{bike}', [App\Http\Controllers\BikeController::class, 'show'])->name('bikes.show');
    Route::get('/bike/edit/{bike}', [App\Http\Controllers\BikeController::class, 'edit'])->name('bikes.edit');
    Route::get('/bike/destroy/{bike}', [App\Http\Controllers\BikeController::class, 'destroy'])->name('bikes.destroy');
    Route::put('/bike/update/{bike}', [App\Http\Controllers\BikeController::class, 'update'])->name('bikes.update');
    # breakfast
    Route::get('/breakfast/list', [App\Http\Controllers\BreakfastController::class, 'index'])->name('breakfasts.index');
    Route::get('/breakfast/create', [App\Http\Controllers\BreakfastController::class, 'create'])->name('breakfasts.create');
    Route::post('/breakfast/store', [App\Http\Controllers\BreakfastController::class, 'store'])->name('breakfasts.store');
    Route::get('/breakfast/show/{breakfast}', [App\Http\Controllers\BreakfastController::class, 'show'])->name('breakfasts.show');
    Route::get('/breakfast/edit/{breakfast}', [App\Http\Controllers\BreakfastController::class, 'edit'])->name('breakfasts.edit');
    Route::get('/breakfast/destroy/{breakfast}', [App\Http\Controllers\BreakfastController::class, 'destroy'])->name('breakfasts.destroy');
    Route::put('/breakfast/update/{breakfast}', [App\Http\Controllers\BreakfastController::class, 'update'])->name('breakfasts.update');

    Route::post('/search', [App\Http\Controllers\SearchController::class, 'search'])->name('search');

    // # items
    // Route::get('/stavka/{id}/kreiraj', [App\Http\Controllers\ItemController::class, 'create'])->name('item.create');
    // Route::post('/stavka/pohrani', [App\Http\Controllers\ItemController::class, 'store'])->name('item.store');
    // Route::get('/stavka/{item}/uredi', [App\Http\Controllers\ItemController::class, 'edit'])->name('item.edit');
    // Route::put('/stavka/{item}/azuriraj', [App\Http\Controllers\ItemController::class, 'update'])->name('item.update');
    // Route::get('/stavka/{item}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('item.destroy');

    Route::get('/pdf/{workingOrder}/{type}',[App\Http\Controllers\PDFController::class, 'show'])->name('pdf.show');

});

