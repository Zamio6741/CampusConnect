<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketplaceImage extends Model
{
    protected $fillable = [
        'marketplace_item_id',
        'image',
    ];

    public function item()
    {
        return $this->belongsTo(MarketplaceItem::class, 'marketplace_item_id');
    }
}