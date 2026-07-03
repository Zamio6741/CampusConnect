<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CampusHostelImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'campus_hostel_id',
        'image_path',
    ];

    public function hostel()
    {
        return $this->belongsTo(CampusHostel::class);
    }
}