<?php

namespace App\Exports;

use App\Models\Bike;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Carbon;

class BikesExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    use Exportable;

    protected $from_date;
    protected $to_date;

    public function __construct($from_date, $to_date)
    {
        $this->from_date = $from_date;
        $this->to_date = $to_date;
    }

    public function collection()
    {
        // Retrieve your collection of users based on the form inputs
        $query = Bike::query();
        $query = $query->whereBetween('pickup_datetime', [$this->from_date, $this->to_date]);
        return $query->get();
    }


    public function headings(): array
    {
        return ['Date', 'Bikes Amount', 'Service', 'Total Price', 'Joka', 'Voucher No.', 'Note'];
    }

    public function map($bike): array
    {
        // Customize the values you want to export here
        return [
            $bike->pickup_datetime->format('d.m.Y.'),
            $bike->bikes_amount,
            $bike->bikeService->name,
            $bike->total_price,
            $bike->total_price / 2,
            $bike->number,
            $bike->note,
        ];
    }
}