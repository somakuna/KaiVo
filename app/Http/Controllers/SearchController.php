<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Bike;
use App\Models\Breakfast;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $input = $request->validate([
            'number' => 'required',
            'type' => 'required',
        ]);

        if($input['type'] == 1) {
            $tour = Tour::where('number', $input['number'])->firstOrFail();
            return view('tours.show', [
                'tour' => $tour,
            ]);
        }
        elseif ($input['type'] == 2) {
            $bike = Bike::where('number', $input['number'])->firstOrFail();
            return view('bikes.show', [
                'bike' => $bike,
            ]);
        }
        else {
            $breakfast = Breakfast::where('number', $input['number'])->firstOrFail();
            return view('breakfasts.show', [
                'breakfast' => $breakfast,
            ]);
        }
    }
}