<?php

namespace App\Http\Controllers;

use App\Models\WorkingOrder;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class WorkingOrderController extends Controller
{
    public function index()
    {
        $workingOrders = WorkingOrder::orderBy('id', 'desc')
            ->get();
        $itemsSum = Item::sum('total');

        return view('workingOrder.index', [
            'workingOrders' => $workingOrders,
            'itemsSum' => $itemsSum,
        ]);
    }

    public function create()
    {
        $nextWorkingOrder = WorkingOrder::nextNumber();
        return view('workingOrder.create', [
            'nextWorkingOrder' => $nextWorkingOrder,
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'number' => 'required',
            'host' => 'required',
            'client' => 'required',
            'vehicle_model' => '',
            'vehicle_km' => '',
            'vehicle_reg_plate' => '',
            'date' => 'required',
            'footnote' => '',
            'items.*.description' => 'required',
            'items.*.amount' => 'required',
            'items.*.price' => 'required',
            'items.*.total' => 'required',
        ]);
        
        $items = $input['items'] ?? [];

        DB::beginTransaction();
        
        $input['user_id'] = Auth::user()->id; // osoba koja je unjela podatke
        $input = WorkingOrder::create($input);

        foreach ($items as $item) {
            $item['id_working_order'] = $input->id;
            Item::create($item);
        }

        DB::commit();

        return redirect()->route('home');
    }

    public function show(WorkingOrder $workingOrder)
    {
        $items = $workingOrder->items;
        
        return view('workingOrder.show', [
            'workingOrder' => $workingOrder,
            'items' => $items,
        ]);
    }

    public function search(Request $request)
    {
        $input = $request->validate([
            'number' => '',
        ]);

        $workingOrder = WorkingOrder::where('number', $input['number'])->firstOrFail();

        $items = $workingOrder->items;
        return view('workingOrder.show', [
            'workingOrder' => $workingOrder,
            'items' => $items,
        ]);

    }

    public function edit(WorkingOrder $workingOrder)
    {
        return view('workingOrder.edit', [
            'workingOrder' => $workingOrder,
        ]);
    }

    public function update(Request $request, WorkingOrder $workingOrder)
    {
        $input = $request->validate([
            'number' => 'required',
            'host' => 'required',
            'client' => 'required',
            'vehicle_model' => '',
            'vehicle_km' => '',
            'vehicle_reg_plate' => '',
            'date' => 'required',
            'footnote' => '',
        ]);
        $workingOrder->update($input);
        return redirect()->route('workingOrder.show', $workingOrder)->with('success', 'Radi nalog je uspješno ažuriran.');
    }

    public function destroy(WorkingOrder $workingOrder)
    {
        try {
            $workingOrder->delete($workingOrder);
            return redirect()->route('home')->with('success', 'Radni nalog uspješno obrisan!');;
        } catch (Exception $e) {
            return back()->with('danger', 'Ne možete obrisati radni nalog!');
        }
    }
}