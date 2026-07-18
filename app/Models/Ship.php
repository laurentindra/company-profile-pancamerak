<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    protected $fillable = [
        'name',
        'type',
        'route',
        'capacity',
        'gt',
        'nt',
        'dimensions',
        'engine',
        'description',
        'image_path'
    ];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
