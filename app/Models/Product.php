<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'business_id',
        'name',
        'category',
        'price',
        'quantity',
        'description',
        'image',
        'featured',
        'available',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}