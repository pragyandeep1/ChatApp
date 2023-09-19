<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function product_seller_name(){
        return $this->belongsTo(User::class,'seller_name');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
