<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PastPaper extends Model
{
    protected $fillable = [
        'user_id',
        'unit_id',
        'title',
        'year',
        'semester',
        'type',
        'description',
        'file_path',
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

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}