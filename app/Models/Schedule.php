<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'ship_id',
        'origin_port',
        'destination_port',
        'departure_time',
        'arrival_time',
        'days_of_week',
        'price_vip',
        'price_economy',
        'price_vehicle'
    ];

    public function ship()
    {
        return $this->belongsTo(Ship::class);
    }
}
