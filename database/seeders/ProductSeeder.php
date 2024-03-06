<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name'        => 'Nokia S1',
                'description' => 'Compact',
                'price'       => 800.00,
            ],
            [
                'name'        => 'Iphone 8S',
                'description' => 'Apple celphone',
                'price'       => 5999.00,
            ],
            [
                'name'        => 'Android A30',
                'description' => 'DVATN',
                'price'       => 2741.37,
            ],
            [
                'name'        => 'Celular 2',
                'description' => 'Lorenzo Ipsulum',
                'price'       => 2500.99,
            ],
            [
                'name'        => 'Celular 3',
                'description' => 'Lorenzo AYLR',
                'price'       => 800.00,
            ],
        ]);
    }
}
