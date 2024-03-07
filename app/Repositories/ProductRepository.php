<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function filter(array $params)
    {
        return Product::query()
            ->latest()
            ->paginate(perPage: $params['per_page'], page: $params['page']);
    }

    public function getPrice(int $productId): ?float
    {
        $product =  Product::select('price')->where('id', $productId)->first();

        return $product->price ?? null;
    }
}
