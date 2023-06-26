<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\TourService;
use App\Models\TourPickupPoint;
use App\Models\Bike;
use App\Models\BikeServices;
use App\Models\Breakfast;
use App\Models\BreakfastService;
use App\Models\BreakfastLocation;
use App\Exports\ToursExport;
use App\Exports\BreakfastsExport;
use App\Exports\BikesExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return view('report.index');
    }

    public function create($pick)
    {
        if($pick == "tours") {
            $tourServices = TourService::get();

            return view('report.tours', [
                'tourServices' => $tourServices,
            ]);
        }
        else if($pick == "bikes") {
            return view('report.bikes');
        }
        else if($pick == "breakfasts") {
            $breakfastServices = BreakfastService::get();
            return view('report.breakfasts', [
                'breakfastServices' => $breakfastServices,
            ]);
        }
    }

    public function tours(Request $request) 
    {
        $request->validate([
            'from_date' => 'required',
            'to_date' => 'required',
            'tour_service_id' => 'required',
        ]);
        $from_date = Carbon::parse($request->from_date);
        $to_date = Carbon::parse($request->to_date);
        $tour_service_id = $request->tour_service_id;

        $tourName = TourService::find($tour_service_id)->name;

        return Excel::download(new ToursExport($from_date, $to_date, $tour_service_id), $tourName . '_' . $from_date->format('d.m.y') . '-' .$to_date->format('d.m.y') . '_tours.xlsx');
    }

    public function bikes(Request $request) 
    {
        $request->validate([
            'from_date' => 'required',
            'to_date' => 'required',
        ]);
        $from_date = Carbon::parse($request->from_date);
        $to_date = Carbon::parse($request->to_date);

        return Excel::download(new BikesExport($from_date, $to_date), 'Bikes' . $from_date->format('d.m.y') . '-' .$to_date->format('d.m.y') . '.xlsx');
    }

    public function breakfasts(Request $request) 
    {
        $request->validate([
            'from_date' => 'required',
            'to_date' => 'required',
            'breakfast_service_id' => 'required',
        ]);
        $from_date = Carbon::parse($request->from_date);
        $to_date = Carbon::parse($request->to_date);
        $breakfast_service_id = $request->breakfast_service_id;

        $breakfastName = BreakfastService::find($breakfast_service_id)->name;

        return Excel::download(new BreakfastsExport($from_date, $to_date, $breakfast_service_id), $breakfastName . '_' . $from_date->format('d.m.y') . '-' .$to_date->format('d.m.y') . '_breakfasts.xlsx');
    }

    public function fast(Request $request)
    {
        $input = $request->validate([
            'number' => 'required',
            'type' => 'required',
        ]);

        if($input['type'] == 1) {
            $tour = Tour::where('number', $input['number'])->firstOrFail();
            return view('tour.show', [
                'tour' => $tour,
            ]);
        }
        elseif ($input['type'] == 2) {
            $bike = Bike::where('number', $input['number'])->firstOrFail();
            return view('bike.show', [
                'bike' => $bike,
            ]);
        }
        else {
            $breakfast = Breakfast::where('number', $input['number'])->firstOrFail();
            return view('breakfast.show', [
                'breakfast' => $breakfast,
            ]);
        }
    }
}