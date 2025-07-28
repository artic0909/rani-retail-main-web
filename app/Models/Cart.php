<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'product_id',
        'purchase_rate',
        'quantity',
        'profit_percentage',
        'selling_price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
