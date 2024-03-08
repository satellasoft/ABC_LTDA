<?php

namespace App\Repositories;

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
                'amount'   => 0,
                'status'   => 1
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

    public function getById(int $salesId): Sales
    {
        return Sales::find($salesId);
    }

    public function updateStatus(int $salesId, int $status): bool
    {
        try {
            $sales = Sales::where('sales_id', $salesId)->first();

            $sales->status = $status;

            $sales->save();
            return true;
        } catch (\Exception $ex) {
            Log::error('Error on update sales status', [
                'sales_id'  => $salesId,
                'status_id' => $status,
                'message'   => $ex->getMessage()
            ]);
            return false;
        }
    }

    public function addItemsToSale($salesId, array $data): bool
    {
        try {
            DB::beginTransaction();

            $sales = Sales::where('sales_id', $salesId)->firstOrFail();
            $productRepository = new ProductRepository();
            $totalAmount = $sales->amount;

            foreach ($data as $product) {
                $productPrice = $productRepository->getPrice($product['product_id']);

                $sales->productSales()->create([
                    'product_id' => $product['product_id'],
                    'amount'     => $product['amount'],
                    'price'      => $productPrice,
                ]);

                $totalAmount += ($productPrice * $product['amount']);
            }

            $sales->update(['amount' => $totalAmount]);

            DB::commit();

            return true;
        } catch (\Exception $ex) {
            DB::rollBack();

            Log::error('Error on adding items to sal', [
                'sales_id' => $salesId,
                'data'     => $data,
                'message'  => $ex->getMessage()
            ]);

            return false;
        }
    }
}
