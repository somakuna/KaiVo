<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
