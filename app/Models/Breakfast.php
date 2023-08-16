<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Breakfast extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = [
        'first_date',
        'last_date',
    ];

    public static function nextNumber()
    {
        $number = self::count();

        if (!$number) {
            return 1;
        }

        return ++$number;
    }

    // user
    public function user(){
        return $this->belongsTo(User::class);
    }

    // BreakfastService service
     public function breakfastService() {
        return $this->belongsTo(BreakfastService::class);
    }

    // BreakfastLocation point
    public function breakfastLocation() {
        return $this->belongsTo(BreakfastLocation::class);
    }

    public function scopeWhereGivenDate($query, $year, $month)
    {
        return $query->whereYear('first_date', $year)->whereMonth('first_date', $month);
    }

    public function scopeTodayStats($query)
    {
        return $query->whereDate('created_at', Carbon::today())->get();
    }
}
