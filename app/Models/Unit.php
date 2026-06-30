<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'programme_id',
        'semester_id',
        'unit_code',
        'unit_name',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}