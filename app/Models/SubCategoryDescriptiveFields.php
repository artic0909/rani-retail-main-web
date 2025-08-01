<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategoryDescriptiveFields extends Model
{
    protected $fillable = [
        'sub_category_id',
        'field_name',
        'field_type',
    ];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function fieldValues()
    {
        return $this->hasMany(Product::class);
    }
}
