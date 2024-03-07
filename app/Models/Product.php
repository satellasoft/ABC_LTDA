<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    const ID = 'id';
    const NAME = 'name';
    const DESCRIPTION = 'description';
    const PRICE = 'price';

    protected $fillable = [
        self::NAME,
        self::DESCRIPTION,
        self::PRICE
    ];

    public function productSales()
    {
        return $this->hasMany(ProductSales::class, 'product_id');
    }
}
