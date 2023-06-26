<?php


namespace App\Http\Controllers;

use PDF;
use App\Models\Tour;
use App\Models\Bike;
use App\Models\Breakfast;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

class PDFController extends Controller
{
    public function tour(Tour $tour)
    {
        //$time = Carbon::now();
        $pdf = PDF::loadView('pdf.tour', [
            'tour' => $tour,
        ]);//->setPaper('a4', 'landscape');
       
        $filename = 'Kairos_Tour_Voucher-' . $tour->number . '.pdf';
        return $pdf->stream($filename);
        
    }

    public function bike(Bike $bike)
    {
        //$time = Carbon::now();
        $pdf = PDF::loadView('pdf.bike', [
            'bike' => $bike,
        ]);//->setPaper('a4', 'landscape');

        $filename = 'Kairos_Bike_Voucher-' . $bike->number . '.pdf';
        return $pdf->stream($filename);
        
    }

    public function breakfast(Breakfast $breakfast)
    {
        //$time = Carbon::now();
        $pdf = PDF::loadView('pdf.breakfast', [
            'breakfast' => $breakfast,
        ]);//->setPaper('a4', 'landscape');

       
        $filename = 'Kairos_Breakfast_Voucher-' . $breakfast->number . '.pdf';
        return $pdf->stream($filename);
        
    }
}