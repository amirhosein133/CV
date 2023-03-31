<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use HasFactory;

    const TYPE_CONNECTION = 'connection';
    const TYPE_PROJECT = 'project';
    const TYPE_ARTICLE = 'article';
    const TYPE_COMMENT = 'comment';
}
