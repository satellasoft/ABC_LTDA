<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\ProductFilterRequest;
use App\Http\Resources\Product\ProductFilterResource;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    private ProductRepository $productRepository;

    public function __construct()
    {
        $this->productRepository = new ProductRepository();
    }

    public function filter(ProductFilterRequest $request): \Illuminate\Http\JsonResponse
    {
        $products = $this->productRepository->filter($request->validated());

        return  ProductFilterResource::collection($products)->response();
    }
}
