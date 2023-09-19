<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trendingservice extends Model
{
    use HasFactory;
    public function trendingservices()
    {
        return $this->hasMany(Trendingservice::class, 'category_id', 'id');
    }
    public function sellerInfo()
    {
        return $this->hasOne(Sellerinfo::class, 'category_id', 'category_id');
    }
}
