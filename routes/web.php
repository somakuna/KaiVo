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
    Route::get('/{year?}', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    # tours
    Route::get('/tour/list', [App\Http\Controllers\TourController::class, 'index'])->name('tour.index');
    Route::get('/tour/create', [App\Http\Controllers\TourController::class, 'create'])->name('tour.create');
    Route::post('/tour/store', [App\Http\Controllers\TourController::class, 'store'])->name('tour.store');
    Route::get('/tour/show/{tour}', [App\Http\Controllers\TourController::class, 'show'])->name('tour.show');
    Route::get('/tour/edit/{tour}', [App\Http\Controllers\TourController::class, 'edit'])->name('tour.edit');
    Route::get('/tour/destroy/{tour}', [App\Http\Controllers\TourController::class, 'destroy'])->name('tour.destroy');
    Route::put('/tour/update/{tour}', [App\Http\Controllers\TourController::class, 'update'])->name('tour.update');
    # bike services
    Route::get('/tour/services/list', [App\Http\Controllers\TourServiceController::class, 'index'])->name('tourService.index');
    Route::get('/tour/services/create', [App\Http\Controllers\TourServiceController::class, 'create'])->name('tourService.create');
    Route::post('/tour/services/store', [App\Http\Controllers\TourServiceController::class, 'store'])->name('tourService.store');
    Route::get('/tour/services/edit/{tourService}', [App\Http\Controllers\TourServiceController::class, 'edit'])->name('tourService.edit');
    Route::get('/tour/services/destroy/{tourService}', [App\Http\Controllers\TourServiceController::class, 'destroy'])->name('tourService.destroy');
    Route::put('/tour/services/update/{tourService}', [App\Http\Controllers\TourServiceController::class, 'update'])->name('tourService.update');
    # bike pickup points
    Route::get('/tour/pickup-points/list', [App\Http\Controllers\TourPickupPointController::class, 'index'])->name('tourPickupPoint.index');
    Route::get('/tour/pickup-points/create', [App\Http\Controllers\TourPickupPointController::class, 'create'])->name('tourPickupPoint.create');
    Route::post('/tour/pickup-points/store', [App\Http\Controllers\TourPickupPointController::class, 'store'])->name('tourPickupPoint.store');
    Route::get('/tour/pickup-points/edit/{tourPickupPoint}', [App\Http\Controllers\TourPickupPointController::class, 'edit'])->name('tourPickupPoint.edit');
    Route::get('/tour/pickup-points/destroy/{tourPickupPoint}', [App\Http\Controllers\TourPickupPointController::class, 'destroy'])->name('tourPickupPoint.destroy');
    Route::put('/tour/pickup-points/update/{tourPickupPoint}', [App\Http\Controllers\TourPickupPointController::class, 'update'])->name('tourPickupPoint.update');
    # bikes
    Route::get('/bike/list', [App\Http\Controllers\BikeController::class, 'index'])->name('bike.index');
    Route::get('/bike/create', [App\Http\Controllers\BikeController::class, 'create'])->name('bike.create');
    Route::post('/bike/store', [App\Http\Controllers\BikeController::class, 'store'])->name('bike.store');
    Route::get('/bike/show/{bike}', [App\Http\Controllers\BikeController::class, 'show'])->name('bike.show');
    Route::get('/bike/edit/{bike}', [App\Http\Controllers\BikeController::class, 'edit'])->name('bike.edit');
    Route::get('/bike/destroy/{bike}', [App\Http\Controllers\BikeController::class, 'destroy'])->name('bike.destroy');
    Route::put('/bike/update/{bike}', [App\Http\Controllers\BikeController::class, 'update'])->name('bike.update');
    # bike services
    Route::get('/bike/services/list', [App\Http\Controllers\BikeServiceController::class, 'index'])->name('bikeService.index');
    Route::get('/bike/services/create', [App\Http\Controllers\BikeServiceController::class, 'create'])->name('bikeService.create');
    Route::post('/bike/services/store', [App\Http\Controllers\BikeServiceController::class, 'store'])->name('bikeService.store');
    Route::get('/bike/services/edit/{bikeService}', [App\Http\Controllers\BikeServiceController::class, 'edit'])->name('bikeService.edit');
    Route::get('/bike/services/destroy/{bikeService}', [App\Http\Controllers\BikeServiceController::class, 'destroy'])->name('bikeService.destroy');
    Route::put('/bike/services/update/{bikeService}', [App\Http\Controllers\BikeServiceController::class, 'update'])->name('bikeService.update');
    # breakfast
    Route::get('/breakfast/list', [App\Http\Controllers\BreakfastController::class, 'index'])->name('breakfast.index');
    Route::get('/breakfast/create', [App\Http\Controllers\BreakfastController::class, 'create'])->name('breakfast.create');
    Route::post('/breakfast/store', [App\Http\Controllers\BreakfastController::class, 'store'])->name('breakfast.store');
    Route::get('/breakfast/show/{breakfast}', [App\Http\Controllers\BreakfastController::class, 'show'])->name('breakfast.show');
    Route::get('/breakfast/edit/{breakfast}', [App\Http\Controllers\BreakfastController::class, 'edit'])->name('breakfast.edit');
    Route::get('/breakfast/destroy/{breakfast}', [App\Http\Controllers\BreakfastController::class, 'destroy'])->name('breakfast.destroy');
    Route::put('/breakfast/update/{breakfast}', [App\Http\Controllers\BreakfastController::class, 'update'])->name('breakfast.update');
    # breakfast service
    Route::get('/breakfast/services/list', [App\Http\Controllers\BreakfastServiceController::class, 'index'])->name('breakfastService.index');
    Route::get('/breakfast/services/create', [App\Http\Controllers\BreakfastServiceController::class, 'create'])->name('breakfastService.create');
    Route::post('/breakfast/services/store', [App\Http\Controllers\BreakfastServiceController::class, 'store'])->name('breakfastService.store');
    Route::get('/breakfast/services/edit/{breakfastService}', [App\Http\Controllers\BreakfastServiceController::class, 'edit'])->name('breakfastService.edit');
    Route::get('/breakfast/services/destroy/{breakfastService}', [App\Http\Controllers\BreakfastServiceController::class, 'destroy'])->name('breakfastService.destroy');
    Route::put('/breakfast/services/update/{breakfastService}', [App\Http\Controllers\BreakfastServiceController::class, 'update'])->name('breakfastService.update');
    # breakfast location
    Route::get('/breakfast/locations/list', [App\Http\Controllers\BreakfastLocationController::class, 'index'])->name('breakfastLocation.index');
    Route::get('/breakfast/locations/create', [App\Http\Controllers\BreakfastLocationController::class, 'create'])->name('breakfastLocation.create');
    Route::post('/breakfast/locations/store', [App\Http\Controllers\BreakfastLocationController::class, 'store'])->name('breakfastLocation.store');
    Route::get('/breakfast/locations/edit/{breakfastLocation}', [App\Http\Controllers\BreakfastLocationController::class, 'edit'])->name('breakfastLocation.edit');
    Route::get('/breakfast/locations/destroy/{breakfastLocation}', [App\Http\Controllers\BreakfastLocationController::class, 'destroy'])->name('breakfastLocation.destroy');
    Route::put('/breakfast/locations/update/{breakfastLocation}', [App\Http\Controllers\BreakfastLocationController::class, 'update'])->name('breakfastLocation.update');
    
    Route::get('/report', [App\Http\Controllers\ReportController::class, 'index'])->name('report.index');
    Route::post('/report/fast', [App\Http\Controllers\ReportController::class, 'fast'])->name('report.fast');
    Route::post('/report/tours', [App\Http\Controllers\ReportController::class, 'tours'])->name('report.tours');
    Route::post('/report/bikes', [App\Http\Controllers\ReportController::class, 'bikes'])->name('report.bikes');
    Route::post('/report/breakfasts', [App\Http\Controllers\ReportController::class, 'breakfasts'])->name('report.breakfasts');
    Route::get('/report/create/{pick}', [App\Http\Controllers\ReportController::class, 'create'])->name('report.create');
    Route::get('/report/store/{pick}', [App\Http\Controllers\ReportController::class, 'store'])->name('report.store');

    Route::get('/pdf/tour/{tour}',[App\Http\Controllers\PDFController::class, 'tour'])->name('pdf.tour');
    Route::get('/pdf/bike/{bike}',[App\Http\Controllers\PDFController::class, 'bike'])->name('pdf.bike');
    Route::get('/pdf/breakfast/{breakfast}',[App\Http\Controllers\PDFController::class, 'breakfast'])->name('pdf.breakfast');

});

