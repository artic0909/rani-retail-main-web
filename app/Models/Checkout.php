<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $fillable = [
        'products',
        'customer_overall_total_amount',
    ];

    protected $casts = [
        'products' => 'array',
    ];

    public function products()
    {
        $productIds = collect($this->products)->pluck('product_id')->toArray();
        return Product::whereIn('id', $productIds)->get();
    }
}
