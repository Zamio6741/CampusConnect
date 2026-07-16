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

        'phone',
        'whatsapp',

        'location',

        'capacity',
        'available_spaces',

        'gender',
        'room_number',

        'verified',
        'featured',
        'available',

        'views',
        'bookings',

    ];

    protected $casts = [

        'verified' => 'boolean',
        'featured' => 'boolean',
        'available' => 'boolean',

        'price' => 'decimal:2',

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

    public function nearbyArea()
    {
        return $this->belongsTo(NearbyArea::class);
    }

    public function photos()
    {
        return $this->hasMany(AccommodationImage::class);
    }

    public function facilities()
    {
        return $this->hasMany(Facility::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function bookingRequests()
    {
    return $this->hasMany(\App\Models\BookingRequest::class);
    }

}