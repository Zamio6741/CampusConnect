<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingRequest extends Model
{
    protected $fillable = [
        'accommodation_id',
        'student_id',
        'visit_date',
        'phone',
        'message',
        'status',
    ];

    public function accommodation()
    {
        return $this->belongsTo(Accommodation::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}