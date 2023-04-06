<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'categoriables_id',
        'categoriables_type'
    ];

    public function articles()
    {
        return $this->morphedByMany(Article::class, 'categoriables');
    }
    public function products()
    {
        return $this->morphedByMany(Product::class, 'categoriables');
    }
    public function projects()
    {
        return $this->morphedByMany(Project::class, 'categoriables');
    }
}
