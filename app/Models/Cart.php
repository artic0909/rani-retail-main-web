<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'product_ids',
    ];

    protected $casts = [
        'product_ids' => 'array',
    ];

    // Relationship to Product modelpublic function getProductsAttribute()
    public function getProductsAttribute()
    {
        return Product::whereIn('id', $this->product_ids ?? [])->get();
    }
}
