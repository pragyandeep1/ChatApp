<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function subcategory()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // relate to trendingservice
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // it will display count in the servies category
    public function services()
    {
        return $this->hasMany(Service::class, 'category_id');
    }
    public function promotions()
    {
        return $this->hasMany(Category::class,'category_id');
    }
}
