<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    
    public function user()
    {
        return $this->belongsTo(User::class, 'seller_name');
    }
    public function sellerInfo()
    {
        return $this->belongsTo(SellerInfo::class, 'category_id');
    }
    public function claimedRequests()
    {
        return $this->hasMany(ClaimedRequest::class, 'service_id');
    }
     // Define the one-to-many relationship with Faq model
     public function faqs()
     {
         return $this->hasMany(Faq::class, 'service_id');
     }
    
     
    
}
