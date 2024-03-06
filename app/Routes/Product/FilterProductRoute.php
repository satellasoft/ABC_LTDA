<?php

namespace App\Routes\Product;

/**
 * @OA\Get(
 *     path="/product/list",
 *     summary="Get a list of products",
 *     tags={"Products"},
 *     @OA\Parameter(
 *         name="per_page",
 *         in="query",
 *         description="Number of items per page",
 *         @OA\Schema(type="integer", default=10)
 *     ),
 *     @OA\Parameter(
 *         name="page",
 *         in="query",
 *         description="Page number",
 *         @OA\Schema(type="integer", default=1)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(ref="#/components/schemas/ProductFilterResource")
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Invalid request"
 *     )
 * )
 */
class FilterProductRoute
{
}
