<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
   protected $fillable = [

    'user_id',
    'title',
    'message',
    'type',
    'link',
    'is_read',

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

    public function scopeRecent($query)
{
    return $query->where(
        'created_at',
        '>=',
        now()->subDays(7)
    );
}

}