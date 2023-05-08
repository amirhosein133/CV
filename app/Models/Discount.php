<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $fillable = ['code' , 'percent' , 'limit' , 'expire_time' , 'discountable_id' , 'discountable_type'];

    public function discountable()
    {
        return $this->morphTo();
    }


}
