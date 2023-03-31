<?php

namespace App\Traits;

trait SearchTrait
{
    public function scopeSearch($query, $keywords, $relations = null, $attributes = null)
    {
        $keywords = explode(' ', $keywords);
        foreach ($keywords as $keyword) {
            foreach ($relations as $rel) {
                $query->whereHas($rel, function ($query) use ($keyword) {
                    $query->where('name', 'LIKE', '%' . $keyword . '%');
                });
                foreach ($attributes as $at) {
                    $query->OrWhere($at, 'LIKE', '%' . $keyword . '%');
                }
            }
        }
        return $query;
    }
}
