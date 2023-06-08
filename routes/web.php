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
    Route::get('/', [App\Http\Controllers\WorkingOrderController::class, 'index'])->name('home');

    # working order
     
    Route::get('/radni-nalog/novi', [App\Http\Controllers\WorkingOrderController::class, 'create'])->name('workingOrder.create');
    Route::post('/radni-nalog/pohrani', [App\Http\Controllers\WorkingOrderController::class, 'store'])->name('workingOrder.store');
    Route::get('/radni-nalog/pregled/{workingOrder}', [App\Http\Controllers\WorkingOrderController::class, 'show'])->name('workingOrder.show');
    Route::post('/radni-nalog/trazi/', [App\Http\Controllers\WorkingOrderController::class, 'search'])->name('workingOrder.search');
    Route::get('/radni-nalog/uredi/{workingOrder}', [App\Http\Controllers\WorkingOrderController::class, 'edit'])->name('workingOrder.edit');
    Route::get('/radni-nalog/obrisi/{workingOrder}', [App\Http\Controllers\WorkingOrderController::class, 'destroy'])->name('workingOrder.destroy');
    Route::put('/radni-nalog/azuriraj/{workingOrder}', [App\Http\Controllers\WorkingOrderController::class, 'update'])->name('workingOrder.update');

    # items
    Route::get('/stavka/{id}/kreiraj', [App\Http\Controllers\ItemController::class, 'create'])->name('item.create');
    Route::post('/stavka/pohrani', [App\Http\Controllers\ItemController::class, 'store'])->name('item.store');
    Route::get('/stavka/{item}/uredi', [App\Http\Controllers\ItemController::class, 'edit'])->name('item.edit');
    Route::put('/stavka/{item}/azuriraj', [App\Http\Controllers\ItemController::class, 'update'])->name('item.update');
    Route::get('/stavka/{item}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('item.destroy');

    Route::get('/pdf/{workingOrder}/{type}',[App\Http\Controllers\PDFController::class, 'show'])->name('pdf.show');

});

