<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',

        'role_id',
        'university_id',
        'faculty_id',
        'department_id',
        'programme_id',
        'semester_id',

        'profile_photo',
        'bio',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Academic Relationships
    |--------------------------------------------------------------------------
    */

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Notes
    |--------------------------------------------------------------------------
    */

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Accommodation Passes
    |--------------------------------------------------------------------------
    */

    public function accommodationPasses()
    {
        return $this->hasMany(AccommodationPass::class);
    }

    public function hasActiveAccommodationPass()
    {
        return $this->accommodationPasses()
            ->where('status', 'paid')
            ->where('expires_at', '>', now())
            ->exists();
    }

    /*
    |--------------------------------------------------------------------------
    | Legacy Hostels
    |--------------------------------------------------------------------------
    */

    public function hostels()
    {
        return $this->hasMany(Hostel::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Accommodation Listings
    |--------------------------------------------------------------------------
    */

    public function accommodations()
    {
        return $this->hasMany(Accommodation::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Saved Accommodations
    |--------------------------------------------------------------------------
    */

    public function savedAccommodations()
    {
        return $this->hasMany(SavedAccommodation::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Accommodation Reviews
    |--------------------------------------------------------------------------
    */

    public function accommodationReviews()
    {
        return $this->hasMany(Review::class);
    }
    public function marketplaceFavorites()
{
    return $this->hasMany(MarketplaceFavorite::class);
}
public function businesses()
{
    return $this->hasMany(Business::class);
}
}