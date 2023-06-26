<?php

namespace App\Http\Controllers;

use App\Models\TourPickupPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TourPickupPointController extends Controller
{
    public function index()
    {
        $tourPickupPoints = TourPickupPoint::orderBy('name', 'desc')
            ->get();

        return view('tourPickupPoint.index', [
            'tourPickupPoints' => $tourPickupPoints,
        ]);
    }

    public function create()
    {
        return view('tourPickupPoint.create');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required',
        ]);

        DB::beginTransaction();
        TourPickupPoint::create($input);
        DB::commit();
        return redirect()->route('tourPickupPoint.index')->with('success', 'Tour Pickup Point is successfully added.');
    }

    public function edit(TourPickupPoint $tourPickupPoint)
    {
        return view('tourPickupPoint.edit', [
            'tourPickupPoint' => $tourPickupPoint,
        ]);
    }

    public function update(Request $request, TourPickupPoint $tourPickupPoint)
    {
        $input = $request->validate([
            'name' => 'required',
        ]);

        $tourPickupPoint->update($input);
        return redirect()->route('tourPickupPoint.index')->with('success', 'Tour Pickup Point is successfully edited.');
    }

    public function destroy(TourPickupPoint $tourPickupPoint)
    {
        try {
            if($tourPickupPoint->id == 1) 
                return redirect()->route('tourPickupPoint.index')->with('warning', 'Tour Pickup Point with ID 1 can only be edited!');
            $tourPickupPoint->delete($tourPickupPoint);
            return redirect()->route('tourPickupPoint.index')->with('success', 'Tour Pickup Point is successfully deleted.');
        } catch (\Exception $e) {
            return back()->with('danger', 'This cannot be deleted because it has Vouchers attached!');
        }
    }
}
