<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Likedservice extends Model
{
    use HasFactory;
    protected $table = 'liked_services';
    public $timestamps = false;
    public static function countWishlist($service_id){
        $countwishlist = Likedservice::where(['user_id'=>Auth::user()->id,'service_id'=>$service_id])->count();
        return $countwishlist;
    }
    public static function countWishlistForServices($user_id, $sellerInfos)
    {
        $serviceIds = $sellerInfos->pluck('id')->toArray();

        if ($user_id) {
            $wishlistCounts = Likedservice::whereIn('service_id', $serviceIds)
                ->where('user_id', $user_id)
                ->groupBy('service_id')
                ->select('service_id', DB::raw('count(*) as count'))
                ->pluck('count', 'service_id')
                ->toArray();
        } else {
            $wishlistCounts = [];
        }

        $result = [];
        foreach ($serviceIds as $serviceId) {
            $result[$serviceId] = isset($wishlistCounts[$serviceId]) ? $wishlistCounts[$serviceId] : 0;
        }

        return $result;
    }
    public function sellerInfo()
    {
        return $this->belongsTo(Sellerinfo::class, 'service_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    // bijay
    public function seller()
    {
        return $this->belongsTo(Sellerinfo::class,'service_id');
    }
}
