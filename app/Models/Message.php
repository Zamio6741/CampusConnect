<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'business_id',
        'student_id',
        'message',
        'reply',
        'is_read',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}