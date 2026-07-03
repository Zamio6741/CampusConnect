<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hostel extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',

        'university',

        'hostel_name',

        'gender',

        'room_number',

        'capacity',

        'available_spaces',

        'description',

        'warden_name',

        'warden_phone',

        'image',

        'active',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}