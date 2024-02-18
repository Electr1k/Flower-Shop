<?php

namespace App\Http\Resources\Basket;

use App\Http\Resources\Product\ProductResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BasketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $products =  ProductResource::collection($this->products);
        return [
            'products' => $products,
            'total_price' => $products->sum(function($p){
                return $p->flower->price * $p->count;
            })
        ];
    }
}
