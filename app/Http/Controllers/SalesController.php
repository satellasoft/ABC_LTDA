<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sales\SalesStoreRequest;
use App\Http\Resources\Sales\SalesResource;
use App\Repositories\SalesRepository;

class SalesController extends Controller
{
    private SalesRepository $salesRepository;

    public function __construct()
    {
        $this->salesRepository = new SalesRepository();
    }

    public function store(SalesStoreRequest $request)
    {
        $form = $request->validated();

        if (!$this->salesRepository->store($form))
            return response()->json('Sales not complete', 500);

        return response()->json('Sales created', 201);
    }

    public function show(int $salesId)
    {
        $sales =  $this->salesRepository->getById($salesId);

        if ($sales == null)
            return response()->json('Sales not found', 404);

        return new SalesResource($sales);
    }
}
