<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SpiderLog extends Model
{
    protected $fillable = [
        'spider_run_id',
        'level',
        'message',
        'context',
    ];

    protected $casts = [
        'context' => 'array',
    ];

    /**
     * Get the spider run that owns the log.
     */
    public function spiderRun(): BelongsTo
    {
        return $this->belongsTo(SpiderRun::class);
    }

    /**
     * Create an info log.
     */
    public static function info(int $spiderRunId, string $message, ?array $context = null): self
    {
        return self::create([
            'spider_run_id' => $spiderRunId,
            'level' => 'info',
            'message' => $message,
            'context' => $context,
        ]);
    }

    /**
     * Create a warning log.
     */
    public static function warning(int $spiderRunId, string $message, ?array $context = null): self
    {
        return self::create([
            'spider_run_id' => $spiderRunId,
            'level' => 'warning',
            'message' => $message,
            'context' => $context,
        ]);
    }

    /**
     * Create an error log.
     */
    public static function error(int $spiderRunId, string $message, ?array $context = null): self
    {
        return self::create([
            'spider_run_id' => $spiderRunId,
            'level' => 'error',
            'message' => $message,
            'context' => $context,
        ]);
    }
}
