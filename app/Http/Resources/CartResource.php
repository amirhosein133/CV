<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'user_name' => $this->getUser($this->user_id),
            'name' => $this->product_name,
            'quantity' => $this->quantity,
            'product_price' => $this->product_price,
            'total_price' => $this->total_price,
        ];
    }

    protected function getUser($id)
    {
        $user = User::whereId($id)->first();
        return $user->name;
    }
}
