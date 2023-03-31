<?php

namespace App\Models;

use App\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory, SearchTrait;

    protected $fillable = [
        'parent_id',
        'approved',
        'body',
        'commentable_id',
        'commentable_type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commentable()
    {
        return $this->morphTo();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'parent_id', 'id');
    }

    public function ManageComment($model)
    {
//        return $comment->approved == 1 and $comment->parent_id == 0 ? true : false;
        return $model->comments()->where('approved',1)->where('parent_id' , 0)->get();
    }

    public function ParentComment(Comment $comment)
    {
        return $this->comments()->where('parent_id', $comment->id)->get();
    }

    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favoritable');
    }


}
