<?php

namespace App\Models;

use App\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\SchemalessAttributes\Casts\SchemalessAttributes;

class Article extends Model
{
    use HasFactory, SearchTrait;

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'description',
        'viewCount',
        'commentCount',
        'image',
    ];
    public $casts = [
        'extra_attributes' => SchemalessAttributes::class,
    ];

    public function scopeWithExtraAttributes(): Builder
    {
        return $this->extra_attributes->modelScope();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categoriables');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favoritable');
    }

    public function medias()
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    public function manageComment($id)
    {
        return Comment::where('commentable_type', get_class($this))
            ->where('commentable_id', $id)
            ->where('approved', 1)
            ->get();
    }
}
