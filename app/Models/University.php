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
     * Businesses registered under this university.
     */
    public function businesses()
    {
        return $this->hasMany(Business::class);
    }

    /**
     * Notes belonging to this university.
     */
    public function notes()
    {
        return $this->hasMany(Note::class);
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

    /**
     * Announcements belonging to this university.
     */
    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }

    /**
     * Accommodations belonging to this university.
     */
    public function accommodations()
    {
        return $this->hasMany(Accommodation::class);
    }
}