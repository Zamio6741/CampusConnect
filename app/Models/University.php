<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $fillable = [
        'name',
        'short_name',
        'city',
        'country',
        'logo',
    ];

    public function faculties()
    {
        return $this->hasMany(Faculty::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}