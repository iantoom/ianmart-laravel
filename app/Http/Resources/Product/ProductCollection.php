<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'price' => $this->price,
            'stock' => $this->stock == 0 ? 'Out of stock' : $this->stock,
            'discount' => $this->discount,
            'totalPrice' => round($this->price*(1-$this->discount/100), 2),
            'rating' => $this->reviews->count() > 0 ?
                \round($this->reviews->sum('star')/$this->reviews->count(), 2, PHP_ROUND_HALF_UP) // limit the digits after decimal point and round the decimal point half up
                : 'No review for this product',
            'href' => [
                'detail' => route('products.show', $this->id) // return link in JSON payload
            ]
        ];
    }
}
