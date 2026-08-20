<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /*
    |--------------------------------------------------------------------------
    | Mass Assignable Attributes
    |--------------------------------------------------------------------------
    */

    protected $fillable = [
        'name',
        'email',
        'password',

        // Role
        'role_id',
        'is_admin',

        // Academic information
        'university_id',
        'faculty_id',
        'department_id',
        'programme_id',
        'semester_id',

        // Profile
        'profile_photo',
        'bio',
        'last_seen',
    ];

    /*
    |--------------------------------------------------------------------------
    | Hidden Attributes
    |--------------------------------------------------------------------------
    */

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /*
    |--------------------------------------------------------------------------
    | Attribute Casting
    |--------------------------------------------------------------------------
    */

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'last_seen' => 'datetime',
            'is_admin' => 'boolean',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Role Relationship
    |--------------------------------------------------------------------------
    */

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Role Helpers
    |--------------------------------------------------------------------------
    */

    public function isAdmin(): bool
    {
        return $this->is_admin === true ||
               optional($this->role)->name === 'Admin';
    }

    public function isStudent(): bool
    {
        return optional($this->role)->name === 'Student';
    }

    public function isLandlord(): bool
    {
        return optional($this->role)->name === 'Landlord';
    }

    public function isBusinessOwner(): bool
    {
        return optional($this->role)->name === 'Business Owner';
    }

    /*
    |--------------------------------------------------------------------------
    | Academic Relationships
    |--------------------------------------------------------------------------
    */

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
    | Student Semesters
    |--------------------------------------------------------------------------
    */

    public function semesters(): HasMany
    {
        return $this->hasMany(StudentSemester::class);
    }

    public function currentSemester(): HasOne
    {
        return $this->hasOne(StudentSemester::class)
            ->latestOfMany();
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

    public function hasActiveAccommodationPass(): bool
    {
        return $this->accommodationPasses()
            ->where('status', 'paid')
            ->where('expires_at', '>', now())
            ->exists();
    }

    /*
    |--------------------------------------------------------------------------
    | Hostels
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

    /*
    |--------------------------------------------------------------------------
    | Marketplace
    |--------------------------------------------------------------------------
    */

    public function marketplaceFavorites()
    {
        return $this->hasMany(MarketplaceFavorite::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Businesses
    |--------------------------------------------------------------------------
    */

  public function business(): HasOne
{
    return $this->hasOne(Business::class);
}

    /*
    |--------------------------------------------------------------------------
    | Business Reviews
    |--------------------------------------------------------------------------
    */

    public function businessReviews()
    {
        return $this->hasMany(BusinessReview::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Bookings
    |--------------------------------------------------------------------------
    */

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'student_id');
    }

    /*
    |--------------------------------------------------------------------------
    | Notifications
    |--------------------------------------------------------------------------
    */

    public function notifications()
    {
        return $this->hasMany(\App\Models\Notification::class)
            ->latest();
    }

    /*
    |--------------------------------------------------------------------------
    | Messages
    |--------------------------------------------------------------------------
    */

    public function messages()
    {
        return $this->hasMany(Message::class, 'student_id');
    }

    /*
    |--------------------------------------------------------------------------
    | Online Status
    |--------------------------------------------------------------------------
    */

    /**
     * Determine if the user is currently online.
     */
    public function isOnline(): bool
    {
        return $this->last_seen &&
               $this->last_seen->gt(now()->subMinutes(5));
    }

    /*
    |--------------------------------------------------------------------------
    | Profile Helpers
    |--------------------------------------------------------------------------
    */

    /**
     * Return the user's profile photo URL.
     */
    public function profilePhotoUrl(): string
    {
        if ($this->profile_photo) {
            return asset('storage/' . $this->profile_photo);
        }

        return 'https://ui-avatars.com/api/?name=' .
            urlencode($this->name) .
            '&background=2563eb&color=ffffff&bold=true';
    }

    /**
     * Return the user's display name.
     */
    public function displayName(): string
    {
        return $this->name ?: 'CampusConnect Student';
    }
}