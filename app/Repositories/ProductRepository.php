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
}
