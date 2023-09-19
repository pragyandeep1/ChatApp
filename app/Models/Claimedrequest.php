<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Claimedrequest extends Model
{
    use HasFactory,SoftDeletes;
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
