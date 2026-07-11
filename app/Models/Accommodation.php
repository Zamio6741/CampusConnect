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
        'nearby_area_id',

        'listing_type',
        'property_type',

        'title',
        'description',

        'price',

        'capacity',
        'available_spaces',

        'phone',
        'whatsapp',

        'location',
        'area',

        'latitude',
        'longitude',

        'gender',
        'room_number',

        'verified',
        'featured',

    ];

    protected $casts = [

        'verified' => 'boolean',
        'featured' => 'boolean',

        'latitude' => 'float',
        'longitude' => 'float',

        'price' => 'decimal:2',

    ];

    /*
    |--------------------------------------------------------------------------
    | Owner
    |--------------------------------------------------------------------------
    */

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /*
    |--------------------------------------------------------------------------
    | University
    |--------------------------------------------------------------------------
    */

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Nearby Area
    |--------------------------------------------------------------------------
    */

    public function nearbyArea()
    {
        return $this->belongsTo(NearbyArea::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Photos
    |--------------------------------------------------------------------------
    */

   public function photos()
{
    return $this->hasMany(AccommodationImage::class);
}
    /*
    |--------------------------------------------------------------------------
    | Facilities
    |--------------------------------------------------------------------------
    */

    public function facilities()
    {
        return $this->belongsToMany(
            Facility::class,
            'accommodation_facility'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Reviews
    |--------------------------------------------------------------------------
    */

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Saved By Users
    |--------------------------------------------------------------------------
    */

    public function savedBy()
    {
        return $this->hasMany(SavedAccommodation::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Bookings
    |--------------------------------------------------------------------------
    */

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}