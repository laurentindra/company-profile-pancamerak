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

    /**
     * Get array of image paths (supports multi-image ships separated by comma)
     */
    public function getImagesAttribute(): array
    {
        if (empty($this->image_path)) {
            return [];
        }

        if (str_starts_with(trim($this->image_path), '[')) {
            return json_decode($this->image_path, true) ?? [];
        }

        return array_values(array_filter(array_map('trim', explode(',', $this->image_path))));
    }

    /**
     * Get first image path for thumbnails
     */
    public function getFirstImageAttribute(): ?string
    {
        $images = $this->images;
        return count($images) > 0 ? $images[0] : $this->image_path;
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
