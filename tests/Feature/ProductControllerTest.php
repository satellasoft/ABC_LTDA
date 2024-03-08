<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function it_can_filter_products()
    {
        Product::factory()->count(5)->create();

        $response = $this->get('/api/product/list?per_page=1&page=1');

        $response->assertOk();

        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'name',
                    'description',
                    'price',
                ],
            ],
            'meta' => [
                'current_page',
                'from',
                'last_page',
                'path',
                'per_page',
                'to',
                'total',
            ],
        ]);
    }
}
