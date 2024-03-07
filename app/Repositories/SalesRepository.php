<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\Sales;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class SalesRepository
{

    public function store(array $data): bool
    {
        try {
            DB::beginTransaction();

            $sales = Sales::create([
                'sales_id' =>  sprintf('%s%s', date('Y'), Sales::getRandomNumber(5)),
                'amount' => 0
            ]);

            $productRepository = new ProductRepository();
            $totalAmount = 0;

            foreach ($data as $product) {

                $productPrice = $productRepository->getPrice($product['product_id']);

                $sales->productSales()->create([
                    'product_id' => $product['product_id'],
                    'amount'     => $product['amount'],
                    'price'      => $productPrice,
                ]);

                $totalAmount += ($productPrice * $product['amount']);
                //DEBUG
                // if ($product['product_id'] == 100) {
                //     dd([
                //         'price' => $productPrice,
                //         'amount' => $product['amount'],
                //         'sum' => ($productPrice * $product['amount']),
                //         'total_before' => $totalAmount,
                //         'total_after' => $totalAmount += ($productPrice * $product['amount']),
                //     ]);
                // }
            }

            $sales->update(['amount' => $totalAmount]);

            DB::commit();

            return true;
        } catch (\Exception $ex) {
            DB::rollBack();

            Log::error('Error on register sales', [
                'data' => $data,
                'message' => $ex->getMessage()
            ]);
            return false;
        }
    }

    public function getById(int $salesId)
    {
        return Sales::find($salesId);
    }
}
