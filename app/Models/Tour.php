<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Carbon;

class Tour extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = [
        'date',
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

    // tour service
     public function tourService() {
        return $this->belongsTo(TourService::class);
    }

    // tour pick-up point
    public function tourPickupPoint() {
        return $this->belongsTo(TourPickupPoint::class);
    }

    public function scopeWhereGivenDate($query, $year, $month)
    {
        return $query->whereYear('date', $year)->whereMonth('date', $month);
    }

    public function scopeTodayStats($query)
    {
        return $query->whereDate('created_at', Carbon::today())->get();
    }
}
