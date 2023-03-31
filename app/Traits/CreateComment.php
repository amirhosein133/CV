<?php

namespace App\Traits;

use App\Models\Comment;

trait CreateComment
{
    public function CreateComment($attributes)
    {
        $comment = auth()->user()->comments()->create([
            'parent_id' => $attributes['parent_id'],
            'commentable_id' => $attributes['commentable_id'],
            'commentable_type' => $attributes['commentable_type'],
            'body' => $attributes['body']
        ]);
        return $comment;
    }
}
