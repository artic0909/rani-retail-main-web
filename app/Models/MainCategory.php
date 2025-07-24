<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    protected $fillable = [
        'main_category_name',
        'slug',
    ];

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
