<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}
