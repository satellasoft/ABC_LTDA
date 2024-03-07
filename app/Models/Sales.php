<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $table = 'products';

    const ID = 'id';
    const SALES_ID = 'sales_id';
    const AMOUNT = 'amount';

    protected $fillable = [
        self::ID,
        self::SALES_ID,
        self::AMOUNT
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_sales')
            ->withPivot(ProductSales::AMOUNT, ProductSales::PRICE);
    }
}
