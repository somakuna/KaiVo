<?php

namespace App\Exports;

use App\Models\Tour;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Carbon;

class ToursExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    use Exportable;

    protected $from_date;
    protected $to_date;
    protected $tour_service_id;

    public function __construct($from_date, $to_date, $tour_service_id)
    {
        $this->from_date = $from_date;
        $this->to_date = $to_date;
        $this->tour_service_id = $tour_service_id;
    }

    public function collection()
    {
        // Retrieve your collection of users based on the form inputs
        $query = Tour::query();
        $query = $query->whereBetween('date', [$this->from_date, $this->to_date]);
        $query = $query->where('tour_service_id', $this->tour_service_id);
        return $query->get();
    }


    public function headings(): array
    {
        return ['Date', 'Adults', 'Children', 'Infants', 'Total Price', 'Commission', 'Calculation', 'Voucher No.', 'Invoice No.', 'Note'];
    }

    public function map($tour): array
    {
        // Customize the values you want to export here
        return [
            $tour->date->format('d.m.Y.'),
            $tour->adults_amount,
            $tour->children_amount,
            $tour->infants_amount,
            $tour->total_price,
            '',
            '',
            $tour->number,
            '',
            $tour->note,
        ];
    }
}