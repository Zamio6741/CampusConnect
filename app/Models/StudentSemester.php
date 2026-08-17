<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentSemester extends Model
{
    protected $fillable = [
        'user_id',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Check whether this semester is currently active.
     */
    public function isActive(): bool
    {
        return now()->between(
            $this->start_date->startOfDay(),
            $this->end_date->endOfDay()
        );
    }

    /**
     * Check whether the semester has ended.
     */
    public function hasEnded(): bool
    {
        return now()->startOfDay()->greaterThan($this->end_date->startOfDay());
    }

    /**
     * Get semester progress as a percentage.
     */
    public function progress(): int
    {
        $today = now()->startOfDay();

        if ($today->lt($this->start_date->startOfDay())) {
            return 0;
        }

        if ($today->gt($this->end_date->startOfDay())) {
            return 100;
        }

        $totalDays = $this->start_date->diffInDays($this->end_date);

        if ($totalDays <= 0) {
            return 100;
        }

        $elapsedDays = $this->start_date->diffInDays($today);

        return min(
            100,
            max(
                0,
                (int) round(($elapsedDays / $totalDays) * 100)
            )
        );
    }
}