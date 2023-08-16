<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use App\Models\BikeService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BikeController extends Controller
{
    public function index()
    {
        $bikes = Bike::with('bikeService')->orderBy('id', 'desc')
            ->get();

        return view('bike.index', [
            'bikes' => $bikes,
        ]);
    }

    public function create()
    {
        $bikeServices  = BikeService::get();
        $nextBike = Bike::nextNumber();
        return view('bike.create', [
            'nextBike' => $nextBike,
            'bikeServices' => $bikeServices,
        ]);
    }

    public function store(Request $request)
    {
        
        $input = $request->validate([
            'number' => 'required',
            'guest_name' => 'required',
            'guest_address' => 'required',
            'guest_phone' => '',
            'bike_service_id' => 'required',
            'bikes_amount' => '',
            'pickup_datetime' => 'required',
            'baby_seat' => '',
            'delivery' => '',
            'discount' => '',
            'total_price' => 'required',
            'paid_amount' => '',
            'rest_to_pay_amount' => 'required',
            'note' => '',
        ]);

        DB::beginTransaction();
        $plus_time = BikeService::find($input['bike_service_id'])->finish_time;
        $input['pickup_datetime'] = Carbon::parse($input['pickup_datetime']);
        $input['return_datetime'] = Carbon::parse($input['pickup_datetime'])->add($plus_time);
        $input['user_id'] = Auth::user()->id;
        $input['uuid'] = Str::uuid();
        $bike = Bike::create($input);
        DB::commit();
        return $this->show($bike);
    }

    public function show(Bike $bike)
    {   
        return view('bike.show', [
            'bike' => $bike,
        ]);
    }

    public function edit(Bike $bike)
    {
        $bikeServices  = BikeService::get();

        return view('bike.edit', [
            'bike' => $bike,
            'bikeServices' => $bikeServices,
        ]);
    }

    public function update(Request $request, Bike $bike)
    {
        $input = $request->validate([
            'number' => 'required',
            'guest_name' => 'required',
            'guest_address' => 'required',
            'guest_phone' => '',
            'bike_service_id' => 'required',
            'bikes_amount' => '',
            'pickup_datetime' => 'required',
            'baby_seat' => '',
            'delivery' => '',
            'discount' => '',
            'total_price' => 'required',
            'paid_amount' => '',
            'rest_to_pay_amount' => 'required',
            'note' => '',
        ]);
        $plus_time = BikeService::find($input['bike_service_id'])->finish_time;
        $input['pickup_datetime'] = Carbon::parse($input['pickup_datetime']);
        $input['return_datetime'] = Carbon::parse($input['pickup_datetime'])->add($plus_time);
        $bike->update($input);

        return redirect()->route('bike.show', $bike)->with('success', 'BIKE Voucher is successfully edited.');
    }

    public function destroy(Bike $bike)
    {
        try {
            $bike->delete($bike);
            return redirect()->route('bike.index')->with('success', 'BIKE Voucher is successfully deleted.');
        } catch (Exception $e) {
            return back()->with('danger', $e);
        }
    }
}