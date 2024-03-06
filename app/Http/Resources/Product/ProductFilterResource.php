<?php

namespace App\Http\Resources\Product;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     schema="ProductFilterResource",
 *     type="object",
 *     title="Product data Struct",
 *     allOf={
 *         @OA\Schema(
 *             @OA\Property(
 *                 property="data",
 *                 type="array",
 *                 @OA\Items(
 *                     @OA\Property(
 *                         property="id",
 *                         type="integer",
 *                         description="Product id",
 *                         example=1
 *                     ),
 *                     @OA\Property(
 *                         property="name",
 *                         type="string",
 *                         description="Product name",
 *                         example="Iphone"
 *                     ),
 *                     @OA\Property(
 *                         property="description",
 *                         format="string",
 *                         type="string",
 *                         description="Complete product description",
 *                         example="Iphone. 8GB..."
 *                     ),
 *                     @OA\Property(
 *                         property="price",
 *                         format="decimal",
 *                         type="decimal",
 *                         description="Product princing",
 *                         example="1599.98"
 *                     ),
 *                     @OA\Property(
 *                         property="created_at",
 *                         type="date",
 *                         example="2024-03-05 08:00:00"
 *                     ),
 *                     @OA\Property(
 *                         property="updated_at",
 *                         type="date",
 *                         example="2024-03-05 08:00:00"
 *                     )
 *                 )
 *             ),
 *             @OA\Property(
 *                 property="pagination",
 *                 type="object",
 *                 format="object",
 *                 @OA\Property(
 *                     property="rowsPerPage",
 *                     type="integer",
 *                     format="integer",
 *                     example=10
 *                 ),
 *                 @OA\Property(
 *                     property="page",
 *                     type="integer",
 *                     format="integer",
 *                     example=1
 *                 ),
 *                 @OA\Property(
 *                     property="rowsNumber",
 *                     type="integer",
 *                     format="integer",
 *                     example=10
 *                 ),
 *                 @OA\Property(
 *                     property="total",
 *                     type="integer",
 *                     format="integer",
 *                     example=10
 *                 )
 *             )
 *         )
 *     }
 * )
 */

class ProductFilterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name'        => $this->name,
            'description' => $this->description,
            'price'       => $this->price,
            'created_at'   => Carbon::parse($this->created_at)->format('Y-m-d H:i:s'),
            'updated_at'   => Carbon::parse($this->updated_at)->format('Y-m-d H:i:s'),
        ];
    }
}
