<?php

namespace App\Http\Resources\Product;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'product_id'  => $this->product->id,
            'name'        => $this->product->name,
            'price'       => $this->price,
            'amount'      => $this->amount,
        ];
    }
}
