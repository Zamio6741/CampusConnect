<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'user_id',
        'university_id',
        'faculty_id',
        'department_id',
        'programme_id',
        'semester_id',
        'unit_id',
        'unit_code',
        'unit_name',

        'title',
        'description',
        'file_path',
        'thumbnail',

        'downloads',
        'price',
        'is_premium',
        'status',
    ];

    protected $casts = [
        'is_premium' => 'boolean',
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

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites')
            ->withTimestamps();
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    public function averageRating()
    {
        return round($this->ratings()->avg('rating') ?? 0, 1);
    }

    public function ratingsCount()
    {
        return $this->ratings()->count();
    }

    public function isFavoritedBy(User $user)
    {
        return $this->favorites()
            ->where('user_id', $user->id)
            ->exists();
    }

    public function isFree()
    {
        return !$this->is_premium;
    }

    public function incrementDownloads()
    {
        $this->increment('downloads');
    }
}
