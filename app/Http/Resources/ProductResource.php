<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'viewCount' => $this->viewCount,
            'commentCount' => $this->commentCount,
            'price' => $this->price,
            'categories' => $this->getCategories($this->categories)
        ];
    }

    public function getCategories($categories)
    {
        if (isset($categories)) {
            $name = null;
            foreach ($categories as $category) {
                $name[] = $category->name;
            }
            return $name;
        } else {
            return null;
        }
    }
}
