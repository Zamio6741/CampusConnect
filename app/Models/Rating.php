<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'user_id',
        'note_id',
        'rating',
    ];

    /**
     * User who rated.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Rated note.
     */
    public function note()
    {
        return $this->belongsTo(Note::class);
    }
}