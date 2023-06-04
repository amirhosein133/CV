<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\SchemalessAttributes\Casts\SchemalessAttributes;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_name',
        'quantity',
        'product_price',
        'total_price'
    ];

    protected $casts = [
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
}
