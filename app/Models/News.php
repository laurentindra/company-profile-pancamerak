<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'title',
        'category',
        'published_date',
        'summary',
        'content',
        'image_path'
    ];

    protected $casts = [
        'published_date' => 'date',
    ];
}
