<?php


namespace App\Http\Controllers;

use PDF;
use App\Models\WorkingOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

class PDFController extends Controller
{
    public function show(WorkingOrder $workingOrder, $type)
    {
        $time = Carbon::now();
        $items = $workingOrder->items;
        
        if ($type) {
            $pdf = PDF::loadView('pdf.a5Wo', [
                'workingOrder' => $workingOrder,
                'items' => $items,
                'time' => $time,
            ])->setPaper('a4', 'landscape');
        }
        else {
            $pdf = PDF::loadView('pdf.a4Wo', [
                'workingOrder' => $workingOrder,
                'items' => $items,
                'time' => $time,
            ])->setPaper('a4', 'portrait');
        }
        $filename = 'RN-' . $workingOrder->number . '-' . $workingOrder->client . '.pdf';
        return $pdf->stream($filename);
        
    }

}