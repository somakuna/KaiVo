<?php

namespace App\Exports;

use App\Models\Breakfast;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Carbon;

class BreakfastsExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    use Exportable;

    protected $from_date;
    protected $to_date;
    protected $breakfast_service_id;

    public function __construct($from_date, $to_date, $breakfast_service_id)
    {
        $this->from_date = $from_date;
        $this->to_date = $to_date;
        $this->breakfast_service_id = $breakfast_service_id;
    }

    public function collection()
    {
        $query = Breakfast::query();
        $query = $query->whereBetween('first_date', [$this->from_date, $this->to_date]);
        $query = $query->where('breakfast_service_id', $this->breakfast_service_id);
        return $query->get();
    }


    public function headings(): array
    {
        return ['First Date', 'Last Date', 'Days', 'People Amount', 'Total Price', 'Commission', 'Calculation', 'Voucher No.', 'Invoice No.', 'Note'];
    }

    public function map($breakfast): array
    {
        // Customize the values you want to export here
        return [
            $breakfast->first_date->format('d.m.Y.'),
            $breakfast->last_date->format('d.m.Y.'),
            $breakfast->days,
            $breakfast->people_amount,
            $breakfast->total_price,
            '',
            '',
            $breakfast->number,
            '',
            $breakfast->note,
        ];
    }
}