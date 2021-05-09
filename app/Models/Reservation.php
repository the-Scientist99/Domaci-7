<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    const PER_PAGE = 10;

    protected $guarded = [];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function locationFrom()
    {
        return $this->belongsTo(LocationFrom::class, 'location_from', 'id');
    }

    public function locationTo()
    {
        return $this->belongsTo(LocationFrom::class, 'location_to', 'id');
    }

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }
}
