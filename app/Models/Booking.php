<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'student_id',
        'accommodation_id',
        'move_in_date',
        'message',
        'status',
    ];

    /*
    |--------------------------------------------------------------------------
    | Student
    |--------------------------------------------------------------------------
    */

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    /*
    |--------------------------------------------------------------------------
    | Accommodation
    |--------------------------------------------------------------------------
    */

    public function accommodation()
    {
        return $this->belongsTo(Accommodation::class);
    }
}