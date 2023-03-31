<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Connection extends BaseModel
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'email', 'subject', 'type', 'message', 'status'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
