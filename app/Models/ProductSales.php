<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSales extends Model
{
    use HasFactory;

    const PRODUCT_ID = 'product_id';
    const SALES_ID = 'sales_id';
    const AMOUNT = 'amount';
    const PRICE = 'price';

    protected $fillable = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function sale()
    {
        return $this->belongsTo(Sales::class);
    }
}
