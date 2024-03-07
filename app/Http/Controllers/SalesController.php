<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sales\SalesStoreRequest;
use App\Repositories\SalesRepository;

class SalesController extends Controller
{
    public function store(SalesStoreRequest $request)
    {
        $form = $request->validated();

        if (!(new SalesRepository())->store($form))
            return response()->json('Sales not complete', 500);

        return response()->json('Sales created', 201);
    }
}
