<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketplaceItem extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'price',
        'category',
        'condition',
        'phone',
        'location',
        'status',
    ];

    /*
    |--------------------------------------------------------------------------
    | Seller
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Images
    |--------------------------------------------------------------------------
    */

    public function images()
    {
        return $this->hasMany(MarketplaceImage::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Favorites
    |--------------------------------------------------------------------------
    */

    public function favorites()
    {
        return $this->hasMany(MarketplaceFavorite::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Check if current user has favorited this item
    |--------------------------------------------------------------------------
    */

    public function isFavorited()
    {
        if (!auth()->check()) {
            return false;
        }

        return $this->favorites()
            ->where('user_id', auth()->id())
            ->exists();
    }
}