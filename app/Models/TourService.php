<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourService extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Tours
    public function tours(){
        return $this->hasMany(Tour::class);
    }
}
