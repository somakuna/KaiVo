<?php

namespace App\Http\Controllers;

use App\Models\Breakfast;
use App\Models\BreakfastService;
use App\Models\BreakfastLocation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BreakfastController extends Controller
{
    public function index()
    {
        $breakfasts = Breakfast::with('breakfastService', 'breakfastLocation')->orderBy('id', 'desc')
            ->get();

        return view('breakfast.index', [
            'breakfasts' => $breakfasts,
        ]);
    }

    public function create()
    {
        $breakfastServices  = BreakfastService::get();
        $breakfastLocations  = BreakfastLocation::get();
        $nextBreakfast = Breakfast::nextNumber();
        return view('breakfast.create', [
            'nextBreakfast' => $nextBreakfast,
            'breakfastServices' => $breakfastServices,
            'breakfastLocations' => $breakfastLocations,
        ]);
    }

    public function store(Request $request)
    {
        
        $input = $request->validate([
            'number' => 'required',
            'first_date' => 'required',
            'last_date' => 'required',
            'days' => '',
            'guest_name' => 'required',
            'guest_address' => 'required',
            'guest_phone' => '',
            'breakfast_service_id' => 'required',
            'breakfast_location_id' => '',
            'people_amount' => 'required',
            'discount' => '',
            'total_price' => 'required',
            'paid_amount' => '',
            'rest_to_pay_amount' => 'required',
            'note' => '',
        ]);

        DB::beginTransaction();
        //$plus_time = BikeService::find($input['bike_service_id'])->finish_time;
        $input['first_date'] = Carbon::parse($input['first_date']);
        $input['last_date'] = Carbon::parse($input['last_date']);
        $input['user_id'] = Auth::user()->id;
        $input['uuid'] = Str::uuid();
        $breakfast = Breakfast::create($input);
        DB::commit();
        return $this->show($breakfast);
    }

    public function show(Breakfast $breakfast)
    {   
        return view('breakfast.show', [
            'breakfast' => $breakfast,
        ]);
    }

    public function edit(Breakfast $breakfast)
    {
        $breakfastServices  = BreakfastService::get();
        $breakfastLocations  = BreakfastLocation::get();
        return view('breakfast.edit', [
            'breakfast' => $breakfast,
            'breakfastServices' => $breakfastServices,
            'breakfastLocations' => $breakfastLocations,
        ]);
    }

    public function update(Request $request, Breakfast $breakfast)
    {
        $input = $request->validate([
            'number' => 'required',
            'first_date' => 'required',
            'last_date' => 'required',
            'days' => '',
            'guest_name' => 'required',
            'guest_address' => 'required',
            'guest_phone' => '',
            'breakfast_service_id' => 'required',
            'breakfast_location_id' => '',
            'people_amount' => 'required',
            'discount' => '',
            'total_price' => 'required',
            'paid_amount' => '',
            'rest_to_pay_amount' => 'required',
            'note' => '',
        ]);
        $input['first_date'] = Carbon::parse($input['first_date']);
        $input['last_date'] = Carbon::parse($input['last_date']);
        $input['user_id'] = Auth::user()->id;
        $input['uuid'] = Str::uuid();
        $breakfast->update($input);
        return redirect()->route('breakfast.show', $breakfast)->with('success', 'BREAKFAST Voucher is successfully edited.');
    }

    public function destroy(Breakfast $breakfast)
    {
        try {
            $breakfast->delete($breakfast);
            return redirect()->route('breakfast.index')->with('success', 'BREAKFAST Voucher is successfully deleted.');
        } catch (Exception $e) {
            return back()->with('danger', $e);
        }
    }
}