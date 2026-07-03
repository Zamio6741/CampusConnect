<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'university_id',

        'listing_type',
        'property_type',

        'title',
        'description',

        'price',
        'available_spaces',

        'phone',
        'whatsapp',

        'location',

        // NEW LOCATION FIELDS
        'area',
        'latitude',
        'longitude',

        'verified',
        'featured',
    ];

    protected $casts = [
        'verified' => 'boolean',
        'featured' => 'boolean',
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function images()
    {
        return $this->hasMany(AccommodationImage::class);
    }

    public function facilities()
    {
        return $this->hasMany(Facility::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function savedBy()
    {
        return $this->hasMany(SavedAccommodation::class);
    }
}