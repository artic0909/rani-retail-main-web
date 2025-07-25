<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'sub_category_id',
        'product_name',
        'purchase_details',
        'purchase_unit',
        'unit_type',
        'purchase_rate',
        'transport_cost',
        'field_values',
    ];

    protected $casts = [
        'field_values' => 'array',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function descriptiveField()
    {
        return $this->belongsTo(SubCategoryDescriptiveFields::class, 'sub_category_descriptive_field_id');
    }

    // public function mainCategory()
    // {
    //     return $this->belongsTo(MainCategory::class);
    // }

    // public function subCategory()
    // {
    //     return $this->belongsTo(SubCategory::class);
    // }

    public function mainCategory()
    {
        return $this->belongsTo(MainCategory::class, 'main_category_id'); // Check your actual column name
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }
}
