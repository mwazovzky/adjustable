<?php

namespace MWazovzky\Adjustable;

use MWazovzky\Adjustable\Models\Adjustment;

/**
 * @trait Adjustable
 * allows to track changes for \Illuminate\Database\Eloquent\Model
 */
trait Adjustable
{
    /**
     * Trigger changes (adjustments) log every tyme Model is updated,
     * via Model 'updating' event handler
     */
    public static function bootAdjustable()
    {
        static::updating(function ($client) {
            $client->logAdjustment();
        });
    }

    /**
     * Log the adjustment
     *
     * @param integer|null $userId
     * @return void
     */
    public function logAdjustment($userId = null)
    {
        $userId = $userId ?: \Auth::id();

        return $this->adjustedBy()->attach($userId, $this->getDifference());
    }

    /**
     * Define the adjustment (change):
     *
     * @return array ['before' => $before, 'after' => $after],
     *  where
     *  $before is json encoded before update object { key: value ...}
     *  $after is json encoded after update object { key: value ...}
     *  Only modified fields (keys) are included.
     */
    public function getDifference()
    {
        $changed = $this->getDirty();

        $before = json_encode(array_intersect_key($this->fresh()->toArray(), $changed), JSON_UNESCAPED_UNICODE);
        $after  = json_encode($changed, JSON_UNESCAPED_UNICODE);

        return compact('before', 'after');
    }

    /**
     * Model can have many adjustments, polimorphic relation based on a pivot table
     *
     * @return Illuminate\Database\Eloquent\Relations\morphToMany
     * Model timestamps, before and after fiels are eager loaded,
     * Returned query is sorted by adjustment update_at date
     */
    public function adjustedBy()
    {
        return $this->morphToMany(\App\User::class, 'adjustable')
            ->withTimestamps()
            ->withPivot(['before', 'after'])
            ->latest('pivot_updated_at');
    }

    public function adjustments()
    {
        return $this->morphMany(Adjustment::class, 'adjustable')->latest();
    }

    public function lastAdjustments($limit = 5)
    {
        return $this->adjustments()->take($limit);
    }
}
