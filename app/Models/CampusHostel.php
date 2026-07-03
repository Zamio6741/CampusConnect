<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CampusHostel extends Model
{
    use HasFactory;

    protected $fillable = [
        'university_id',
        'name',
        'gender',
        'block',
        'room_type',
        'rooms_available',
        'description',
        'wifi',
        'water',
        'electricity',
        'laundry',
        'security',
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function images()
    {
        return $this->hasMany(CampusHostelImage::class);
    }
}