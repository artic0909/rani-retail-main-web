<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoldItems extends Model
{
    protected $fillable = [
        'products',
        'customer_overall_total_amount',
        'sold_date',
        'customer_name',
        'custome_email',
        'custome_mobile',
    ];

    protected $casts = [
        'products' => 'array',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
