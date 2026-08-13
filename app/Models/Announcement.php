<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
   protected $fillable = [
    'university_id',
    'title',
    'content',
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

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}