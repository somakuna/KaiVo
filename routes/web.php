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

    # working order
     
    Route::get('/tour/list', [App\Http\Controllers\TourController::class, 'index'])->name('tours.index');
    Route::get('/tour/create', [App\Http\Controllers\TourController::class, 'create'])->name('tours.create');
    Route::post('/tour/store', [App\Http\Controllers\TourController::class, 'store'])->name('tours.store');
    Route::get('/tour/show/{tour}', [App\Http\Controllers\TourController::class, 'show'])->name('tours.show');
    Route::get('/tour/edit/{tour}', [App\Http\Controllers\TourController::class, 'edit'])->name('tours.edit');
    Route::get('/tour/destroy/{tour}', [App\Http\Controllers\TourController::class, 'destroy'])->name('tours.destroy');
    Route::put('/tour/update/{tour}', [App\Http\Controllers\TourController::class, 'update'])->name('tours.update');

    Route::post('/search', [App\Http\Controllers\SearchController::class, 'search'])->name('search');

    // # items
    // Route::get('/stavka/{id}/kreiraj', [App\Http\Controllers\ItemController::class, 'create'])->name('item.create');
    // Route::post('/stavka/pohrani', [App\Http\Controllers\ItemController::class, 'store'])->name('item.store');
    // Route::get('/stavka/{item}/uredi', [App\Http\Controllers\ItemController::class, 'edit'])->name('item.edit');
    // Route::put('/stavka/{item}/azuriraj', [App\Http\Controllers\ItemController::class, 'update'])->name('item.update');
    // Route::get('/stavka/{item}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('item.destroy');

    Route::get('/pdf/{workingOrder}/{type}',[App\Http\Controllers\PDFController::class, 'show'])->name('pdf.show');

});

