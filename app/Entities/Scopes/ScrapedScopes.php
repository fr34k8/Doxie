<?php

namespace App\Entities\Scopes;

trait ScrapedScopes
{
    /**
     * Scope a query to check scraped urls
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUri($query, $uri)
    {
        return $query->where('uri', $uri);
    }
}