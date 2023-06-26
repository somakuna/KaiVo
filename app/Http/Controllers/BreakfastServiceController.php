<?php

namespace App\Http\Controllers;

use App\Models\BreakfastService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BreakfastServiceController extends Controller
{
    public function index()
    {
        $breakfastServices = BreakfastService::orderBy('name', 'desc')
            ->get();

        return view('breakfastService.index', [
            'breakfastServices' => $breakfastServices,
        ]);
    }

    public function create()
    {
        return view('breakfastService.create');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        DB::beginTransaction();
        BreakfastService::create($input);
        DB::commit();
        return redirect()->route('breakfastService.index')->with('success', 'Breakfast Service is successfully added.');
    }

    public function edit(BreakfastService $breakfastService)
    {
        return view('breakfastService.edit', [
            'breakfastService' => $breakfastService,
        ]);
    }

    public function update(Request $request, BreakfastService $breakfastService)
    {
        $input = $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        $breakfastService->update($input);
        return redirect()->route('breakfastService.index')->with('success', 'Breakfast Service is successfully edited.');
    }

    public function destroy(BreakfastService $breakfastService)
    {
        try {
            if($breakfastService->id == 1) 
                return redirect()->route('breakfastService.index')->with('warning', 'Breakfast Service with ID 1 can only be edited!');
            $breakfastService->delete($breakfastService);
            return redirect()->route('breakfastService.index')->with('success', 'Breakfast Service is successfully deleted.');
        } catch (\Exception $e) {
            return back()->with('danger', 'This cannot be deleted because it has Vouchers attached!');
        }
    }
}
