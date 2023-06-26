<?php

namespace App\Http\Controllers;

use App\Models\BreakfastLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BreakfastLocationController extends Controller
{
    public function index()
    {
        $breakfastLocations = BreakfastLocation::orderBy('name', 'desc')
            ->get();

        return view('breakfastLocation.index', [
            'breakfastLocations' => $breakfastLocations,
        ]);
    }

    public function create()
    {
        return view('breakfastLocation.create');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required',
        ]);

        DB::beginTransaction();
        BreakfastLocation::create($input);
        DB::commit();
        return redirect()->route('breakfastLocation.index')->with('success', 'Breakfast Service is successfully added.');
    }

    public function edit(BreakfastLocation $breakfastLocation)
    {
        return view('breakfastLocation.edit', [
            'breakfastLocation' => $breakfastLocation,
        ]);
    }

    public function update(Request $request, BreakfastLocation $breakfastLocation)
    {
        $input = $request->validate([
            'name' => 'required',
        ]);

        $breakfastLocation->update($input);
        return redirect()->route('breakfastLocation.index')->with('success', 'Breakfast Location is successfully edited.');
    }

    public function destroy(BreakfastLocation $breakfastLocation)
    {
        try {
            if($breakfastLocation->id == 1) 
                return redirect()->route('breakfastLocation.index')->with('warning', 'Breakfast Location with ID 1 can only be edited!');
            $breakfastLocation->delete($breakfastLocation);
            return redirect()->route('breakfastLocation.index')->with('success', 'Breakfast Location is successfully deleted.');
        } catch (\Exception $e) {
            return back()->with('danger', 'This cannot be deleted because it has Vouchers attached!');
        }
    }
}
