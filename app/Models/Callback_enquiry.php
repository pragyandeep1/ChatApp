<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Callback_enquiry extends Model
{
    use HasFactory;
    public function seller()
    {
        return $this->belongsTo(Sellerinfo::class, 'seller_id');
    }
}
