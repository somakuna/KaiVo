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
    public function index($year = 2023)
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
            $tourPrice = (float) Tour::WhereGivenYear($year)->WhereGivenMonth($i)->sum('total_price');
            $tourCount = Tour::WhereGivenYear($year)->whereGivenMonth($i)->count();
            $tourMonthTotalPrices->push($tourPrice);
            $tourMonthCount->push($tourCount);
            #bikes
            $bikePrice = (float) Bike::WhereGivenYear($year)->whereGivenMonth($i)->sum('total_price');
            $bikeCount = Bike::WhereGivenYear($year)->whereGivenMonth($i)->count();
            $bikeMonthTotalPrices->push($bikePrice);
            $bikeMonthCount->push($bikeCount);
            #breakfasts
            $breakfastPrice = (float) Breakfast::WhereGivenYear($year)->whereGivenMonth($i)->sum('total_price');
            $breakfastCount = Breakfast::WhereGivenYear($year)->whereGivenMonth($i)->count();
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
