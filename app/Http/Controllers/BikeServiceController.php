<?php

namespace App\Http\Controllers;

use App\Models\BikeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BikeServiceController extends Controller
{
    public function index()
    {
        $bikeServices = BikeService::orderBy('name', 'desc')
            ->get();

        return view('bikeService.index', [
            'bikeServices' => $bikeServices,
        ]);
    }

    public function create()
    {
        return view('bikeService.create');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required',
            'bike_price' => 'required',
            'finish_time' => 'required',
        ]);

        DB::beginTransaction();
        BikeService::create($input);
        DB::commit();
        return redirect()->route('bikeService.index')->with('success', 'Bike Service is successfully added.');
    }

    public function edit(BikeService $bikeService)
    {
        return view('bikeService.edit', [
            'bikeService' => $bikeService,
        ]);
    }

    public function update(Request $request, BikeService $bikeService)
    {
        $input = $request->validate([
            'name' => 'required',
            'bike_price' => 'required',
            'finish_time' => 'required',
        ]);

        $bikeService->update($input);
        return redirect()->route('bikeService.index')->with('success', 'Bike Service is successfully edited.');
    }

    public function destroy(BikeService $bikeService)
    {
        try {
            if($bikeService->id == 1) 
                return redirect()->route('bikeService.index')->with('warning', 'Bike Service with ID 1 can only be edited!');
            $bikeService->delete($bikeService);
            return redirect()->route('bikeService.index')->with('success', 'Bike Service is successfully deleted.');
        } catch (\Exception $e) {
            return back()->with('danger', 'This cannot be deleted because it has Vouchers attached!');
        }
    }
}
