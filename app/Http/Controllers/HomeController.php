<?php

namespace App\Http\Controllers;
use App\Models\Tour;
use App\Models\Bike;
use App\Models\Breakfast;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index ( $year )
    {
        if(!$year) $year = now()->format('Y');

        $tourMonthTotalPrices = collect([]);
        $tourMonthCount = collect([]);
        $bikeMonthTotalPrices = collect([]);
        $bikeMonthCount = collect([]);
        $breakfastMonthTotalPrices = collect([]);
        $breakfastMonthCount = collect([]);

        for ($i=1; $i <= 12; $i++)
        {
            #tours
            $tours = Tour::WhereGivenDate($year, $i)->get();
            $tourPrice = (float) $tours->sum('total_price');
            $tourCount = $tours->count();
            $tourMonthTotalPrices->push($tourPrice);
            $tourMonthCount->push($tourCount);
            #bikes
            $bikes = Bike::WhereGivenDate($year, $i)->get();
            $bikePrice = (float) $bikes->sum('total_price');
            $bikeCount = $bikes->count();
            $bikeMonthTotalPrices->push($bikePrice);
            $bikeMonthCount->push($bikeCount);
            #breakfasts
            $breakfasts = Breakfast::WhereGivenDate($year, $i)->get();
            $breakfastPrice = (float) $breakfasts->sum('total_price');
            $breakfastCount = $breakfasts->count();
            $breakfastMonthTotalPrices->push($breakfastPrice);
            $breakfastMonthCount->push($breakfastCount);
        }

        $months = collect([
            'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
        ]);

        return view('home', [
            'toursToday' => Tour::TodayStats(),
            'bikesToday' => Bike::TodayStats(),
            'breakfastsToday' => Breakfast::TodayStats(),
            'tourPrices' => $tourMonthTotalPrices,
            'tourCounts' => $tourMonthCount,
            'bikePrices' => $bikeMonthTotalPrices,
            'bikeCounts' => $bikeMonthCount,
            'breakfastPrices' => $breakfastMonthTotalPrices,
            'breakfastCounts' => $breakfastMonthCount,
            'months' => $months,
        ]);
    }
}
