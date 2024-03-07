<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSales extends Model
{
    use HasFactory;

    protected $table = 'product_sales';

    const PRODUCT_ID = 'product_id';
    const SALES_ID = 'sales_id';
    const AMOUNT = 'amount';
    const PRICE = 'price';

    protected $fillable = [
        self::PRODUCT_ID,
        self::SALES_ID,
        self::AMOUNT,
        self::PRICE,
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function sale()
    {
        return $this->belongsTo(Sales::class, 'sales_id');
    }
}
