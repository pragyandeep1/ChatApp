<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $fillable = [
        // Add other fillable fields here
        'service_id',
        'question',
        'answer',
    ];
    // Define the many-to-one (inverse of one-to-many) relationship with Service model
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
