<?php

namespace App\Http\Controllers;

use App\Models\TourService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TourServiceController extends Controller
{
    public function index()
    {
        $tourServices = TourService::orderBy('name', 'desc')
            ->get();

        return view('tourService.index', [
            'tourServices' => $tourServices,
        ]);
    }

    public function create()
    {
        return view('tourService.create');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required',
            'adults_price' => 'required',
            'children_price' => 'required',
            'infants_price' => 'required',
            'description' => '',
        ]);

        DB::beginTransaction();
        TourService::create($input);
        DB::commit();
        return redirect()->route('tourService.index')->with('success', 'Tour Service is successfully added.');
    }

    public function edit(TourService $tourService)
    {
        return view('tourService.edit', [
            'tourService' => $tourService,
        ]);
    }

    public function update(Request $request, TourService $tourService)
    {
        $input = $request->validate([
            'name' => 'required',
            'adults_price' => 'required',
            'children_price' => 'required',
            'infants_price' => 'required',
            'description' => '',
        ]);

        $tourService->update($input);
        return redirect()->route('tourService.index')->with('success', 'Tour Service is successfully edited.');
    }

    public function destroy(TourService $tourService)
    {
        try {
            if($tourService->id == 1) 
                return redirect()->route('tourService.index')->with('warning', 'Tour Service with ID 1 can only be edited!');
            $tourService->delete($tourService);
            return redirect()->route('tourService.index')->with('success', 'Tour Service is successfully deleted.');
        } catch (\Exception $e) {
            return back()->with('danger', 'This cannot be deleted because it has Vouchers attached!');
        }
    }
}
