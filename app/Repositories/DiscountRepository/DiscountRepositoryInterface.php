<?php

namespace App\Repositories\DiscountRepository;

use App\Models\Discount;

interface DiscountRepositoryInterface
{

    public function store($attributes);

    public function update($attributes , Discount $discount);

    public function delete(Discount $discount);

}
