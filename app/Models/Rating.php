<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    public function sellerinfo()
    {
        return $this->belongsTo(Sellerinfo::class, 'seller_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
