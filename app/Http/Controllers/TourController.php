<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\TourService;
use App\Models\TourPickupPoint;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function index()
    {
        $tours = Tour::orderBy('id', 'desc')
            ->get();

        return view('tours.index', [
            'tours' => $tours,
        ]);
    }

    public function create()
    {
        $tourServices  = TourService::get();
        $tourPickupPoints  = TourPickupPoint::get();
        $nextTour = Tour::nextNumber();
        return view('tours.create', [
            'nextTour' => $nextTour,
            'tourServices' => $tourServices,
            'tourPickupPoints' => $tourPickupPoints,
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'number' => 'required',
            'guest_name' => 'required',
            'guest_address' => 'required',
            'guest_phone' => '',
            'tour_service_id' => 'required',
            'tour_pickup_point_id' => 'required',
            'adults_amount' => '',
            'children_amount' => '',
            'infants_amount' => '',
            'date' => 'required',
            'discount' => '',
            'total_price' => 'required',
            'paid_amount' => '',
            'rest_to_pay_amount' => 'required',
            'note' => '',
        ]);

        DB::beginTransaction();
        
        $input['user_id'] = Auth::user()->id; // osoba koja je unjela podatke
        $input['uuid'] = Str::uuid();
        $tour = Tour::create($input);
        DB::commit();
        return $this->show($tour);
    }

    public function show(Tour $tour)
    {   
        return view('tours.show', [
            'tour' => $tour,
        ]);
    }

    public function edit(Tour $tour)
    {
        $tourServices  = TourService::get();
        $tourPickupPoints  = TourPickupPoint::get();

        return view('tours.edit', [
            'tour' => $tour,
            'tourServices' => $tourServices,
            'tourPickupPoints' => $tourPickupPoints,
        ]);
    }

    public function update(Request $request, Tour $tour)
    {
        $input = $request->validate([
            'number' => 'required',
            'guest_name' => 'required',
            'guest_address' => 'required',
            'guest_phone' => '',
            'tour_service_id' => 'required',
            'tour_pickup_point_id' => 'required',
            'adults_amount' => '',
            'children_amount' => '',
            'infants_amount' => '',
            'date' => 'required',
            'discount' => '',
            'total_price' => 'required',
            'paid_amount' => '',
            'rest_to_pay_amount' => 'required',
            'note' => '',
        ]);

        $tour->update($input);
        return redirect()->route('tours.show', $tour)->with('success', 'TOUR Voucher is successfully edited.');
    }

    public function destroy(Tour $tour)
    {
        try {
            $tour->delete($tour);
            return redirect()->route('home')->with('success', 'TOUR Voucher is successfully deleted.');;
        } catch (Exception $e) {
            return back()->with('danger', 'You cannot delete this TOUR Voucher!');
        }
    }
}