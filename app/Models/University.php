<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
    ];

    /**
     * Users belonging to this university.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Faculties in this university.
     */
    public function faculties()
    {
        return $this->hasMany(Faculty::class);
    }

    /**
     * Campus hostels belonging to this university.
     */
    public function hostels()
    {
        return $this->hasMany(CampusHostel::class);
    }
}