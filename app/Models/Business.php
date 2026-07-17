<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable = [

        'user_id',

        'university_id',

        'business_name',

        'category',

        'description',

        'phone',

        'whatsapp',

        'email',

        'logo',

        'location',

        'google_maps',

        'facebook',

        'instagram',

        'tiktok',

        'website',

        'status',

        'views',

        'rating',

        'featured'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function images()
{
    return $this->hasMany(BusinessImage::class);
}

}