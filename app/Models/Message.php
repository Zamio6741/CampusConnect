<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'business_id',
        'student_id',
        'sender_id',
        'message',
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

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}