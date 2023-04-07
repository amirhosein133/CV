<?php

namespace App\Repositories\ProductRepository;

use App\Models\Product;

class ElequentProductRepository implements ProductRepositoryInterface
{
    public $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function all()
    {
        return $this->model->paginate();
    }

    public function store($attributes)
    {
        $product = auth('api')->user()->products()->create([
            'name' => $attributes['name'],
            'description' => $attributes['description'] ?? '----',
            'price' => $attributes['price']
        ]);
        if (isset($attributes['categories']))
            $product->categories()->attach($attributes['categories']);
        return $product;
    }

    public function update($attributes, Product $product)
    {
        $product->update($attributes);
        $product->categories()->sync($attributes['categories']);
    }

    public function delete(Product $product)
    {
        $product->delete();
    }
}
