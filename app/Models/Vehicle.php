<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    const PER_PAGE = 10;

    protected $guarded = [];

    public function class()
    {
        return $this->belongsTo(VehicleClass::class);
    }
}
