<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Bike extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = [
        'pickup_datetime',
        'return_datetime',
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
    // bike service
     public function bikeService() {
        return $this->belongsTo(BikeService::class);
    }

    public function scopeWhereGivenYear($query, $year)
    {
        return $query->whereYear('pickup_datetime', $year);
    }
    
    public function scopeWhereGivenMonth($query, $month)
    {
        return $query->whereMonth('pickup_datetime', $month);
    }

    public function scopeTodayStats($query)
    {
        return $query->whereDate('created_at', Carbon::today())->get();
    }

}
