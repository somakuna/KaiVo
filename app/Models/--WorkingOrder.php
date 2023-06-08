<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'host',
        'client',
        'vehicle_model',
        'vehicle_km',
        'vehicle_reg_plate',
        'date',
        'footnote',
        'user_id',
    ];

    protected $dates = [
        'date',
    ];

    public function Items()
    {
        return $this->hasMany(
            Item::class,
            'id_working_order', // Foreign key on the environments table...
            'id' // Foreign key on the deployments table...
        );
    }

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
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
