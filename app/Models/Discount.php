<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Builder;
use Spatie\SchemalessAttributes\Casts\SchemalessAttributes;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'percent', 'limit', 'expire_time', 'used_by_user', 'discountable_id', 'discountable_type'];

    protected $casts = [
        'discountable_id' => 'array',
        'used_by_user' => 'array',
        'extra_attributes' => SchemalessAttributes::class,
    ];

    public function scopeWithExtraAttributes(): Builder
    {
        return $this->extra_attributes->modelScope();
    }

    public function discountable()
    {
        return $this->morphTo();
    }


}
