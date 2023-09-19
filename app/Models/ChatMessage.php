<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    protected $fillable = ['user_id','seller_id','message','status','position','seller_mobile','seller_name'];

    public function storeData($data)
    {
        return self::create($data);
    }
}
