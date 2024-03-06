<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    const NAME = 'name';
    const DESCRIPTION = 'description';
    const PRICE = 'price';

    protected $fillable = [
        self::NAME,
        self::DESCRIPTION,
        self::PRICE
    ];
}
