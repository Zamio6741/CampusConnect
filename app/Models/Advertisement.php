<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $fillable = [

        'business_id',

        'title',

        'description',

        'image',

        'start_date',

        'end_date',

        'status',

        'is_active',

        'views',

        'clicks',

    ];

    protected $casts = [

        'start_date' => 'date',

        'end_date'   => 'date',

        'is_active'  => 'boolean',

    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}