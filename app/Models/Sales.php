<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $table = 'sales';

    const ID = 'id';
    const SALES_ID = 'sales_id';
    const AMOUNT = 'amount';

    protected $fillable = [
        self::ID,
        self::SALES_ID,
        self::AMOUNT
    ];

    public static function getRandomNumber(int $length = 5): int
    {
        $sequence = '';

        for ($i = 0; $i < $length; $i++) {
            $sequence .= mt_rand(0, 1);
        }

        return $sequence;
    }

    public function productSales()
    {
        return $this->hasMany(ProductSales::class, 'sales_id');
    }
}
