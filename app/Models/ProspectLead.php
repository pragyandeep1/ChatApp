<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProspectLead extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'prospect_leads';
    public function seller()
    {
        return $this->belongsTo(Sellerinfo::class,'seller_id');
    }
}
