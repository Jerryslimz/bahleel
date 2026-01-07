<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SpiderRun extends Model
{
    protected $fillable = [
        'spider_name',
        'items_scraped',
        'requests_sent',
        'errors_count',
        'started_at',
        'finished_at',
        'duration_seconds',
        'status',
    ];

    protected $attributes = [
        'items_scraped' => 0,
        'requests_sent' => 0,
        'errors_count' => 0,
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'finished_at' => 'datetime',
    ];

    /**
     * Get the scraped items for the spider run.
     */
    public function scrapedItems(): HasMany
    {
        return $this->hasMany(ScrapedItem::class);
    }

    /**
     * Get the logs for the spider run.
     */
    public function logs(): HasMany
    {
        return $this->hasMany(SpiderLog::class);
    }

    /**
     * Calculate and update duration.
     */
    public function calculateDuration(): void
    {
        if ($this->started_at && $this->finished_at) {
            $this->duration_seconds = abs($this->started_at->diffInSeconds($this->finished_at, false));
            $this->save();
        }
    }
}
