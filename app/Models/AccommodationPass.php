<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccommodationPass extends Model
{
    use HasFactory;
protected $fillable = [
    'user_id',
    'phone',
    'amount',
    'transaction_id',
    'paid_at',
    'expires_at',
    'status',
];

   protected $casts = [
    'paid_at' => 'datetime',
    'expires_at' => 'datetime',
];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    public function active()
    {
        return $this->status === 'paid'
            && $this->expires_at
            && $this->expires_at->isFuture();
    }
}