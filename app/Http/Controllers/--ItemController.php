<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\WorkingOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function index()
    {
        //
    }

    public function create($id)
    {
        return view('item.create', [
            'id_working_order' => $id,
        ]);
    }

    public function store(Request $request)
    {
        
        $input = $request->validate([
            'idWo' => '',
            'items.*.description' => 'required',
            'items.*.amount' => 'required',
            'items.*.price' => 'required',
            'items.*.total' => 'required',
        ]);

        $items = $input['items'] ?? [];

        DB::beginTransaction();

        foreach ($items as $item) {
            $item['id_working_order'] = $input['idWo'];
            Item::create($item);
        }

        DB::commit();

        return redirect()->route('home');
    }

    public function show($id)
    {
        //
    }

    public function edit(Item $item)
    {
        return view('item.edit', [
            'item' => $item,
        ]);
    }

    public function update(Request $request, Item $item)
    {
        $input = $request->validate([
            'description' => 'required',
            'amount' => 'required',
            'price' => 'required',
            'total' => '',
        ]);

        $item->update($input);

        return redirect()->route('workingOrder.show', $item->id_working_order)->with('success', 'Stavka uspješno ažurirana!');
    }

    public function destroy(Item $item)
    {
        try {
            $item->delete($item);
            return back()->with('success', 'Stavka uspješno obrisana!');;
        } catch (Exception $e) {
            return back()->with('danger', 'Ne možete obrisati ovu stavku!');
        }
    }
}
