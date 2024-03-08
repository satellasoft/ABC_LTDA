<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sales\SalesStoreRequest;
use App\Http\Resources\Sales\SalesResource;
use App\Models\Sales;
use App\Repositories\SalesRepository;

//reused
use App\Http\Requests\Product\ProductFilterRequest;

class SalesController extends Controller
{
    /**
     * @var  SalesRepository $salesRepository Instance of Sales Repository
     */
    private SalesRepository $salesRepository;

    /**
     * Construct Method
     *
     * @return void
     */
    public function __construct()
    {
        $this->salesRepository = new SalesRepository();
    }

    /**
     * Store new Sales
     *
     * @param  SalesStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(SalesStoreRequest $request)
    {
        $form = $request->validated();

        if (!$this->salesRepository->store($form))
            return response()->json('Sales not complete', 500);

        return response()->json('Sales created', 201);
    }

    /**
     * Show specif sales by id
     *
     * @param  int $salesId
     * @return \App\Http\Resources\Sales\SalesResource|\Illuminate\Http\JsonResponse
     */
    public function show(int $salesId): \App\Http\Resources\Sales\SalesResource|\Illuminate\Http\JsonResponse
    {
        $sales =  $this->salesRepository->getById($salesId);

        if ($sales == null)
            return response()->json('Sales not found', 404);

        return new SalesResource($sales);
    }

    /**
     * Cancel sales by sales_id
     *
     * @param  int $salesId
     * @return Illuminate\Http\JsonResponse
     */
    public function cancel(int $salesId): \Illuminate\Http\JsonResponse
    {
        if (!$this->salesRepository->updateStatus($salesId, Sales::STATUS_DISABLED))
            return response()->json('Sales not cancel', 500);

        return response()->json('Sales has been cancel', 200);
    }

    public function add(int $sales_id, SalesStoreRequest $request): \Illuminate\Http\JsonResponse
    {
        $form = $request->validated();

        if (!$this->salesRepository->addItemsToSale($sales_id, $form))
            return response()->json(['message' => 'Failed to add items'], 500);

        return response()->json(['message' => 'Items added successfully'], 200);
    }

    public function filter(ProductFilterRequest $request): \Illuminate\Http\JsonResponse
    {
        $sales = $this->salesRepository->filter($request->validated());

        return  SalesResource::collection($sales)->response();
    }
}
