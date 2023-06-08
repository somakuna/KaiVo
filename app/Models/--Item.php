<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['id_working_order', 'description', 'amount', 'price', 'total'];
    public $timestamps = false;
    #public $table = 'items';

    public function workingOrder() {
        $this->belongsTo(workingOrder::class);
    }
}
