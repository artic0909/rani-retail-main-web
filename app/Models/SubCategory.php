<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
        'main_category_id',
        'sub_category_name',
        'slug',
    ];



    public function mainCategory()
    {
        return $this->belongsTo(MainCategory::class);
    }


    public function descriptiveFields()
    {
        return $this->hasMany(SubCategoryDescriptiveFields::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
