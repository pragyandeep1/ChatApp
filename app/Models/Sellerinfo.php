<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sellerinfo extends Model
{
    use HasFactory;
    public function service()
    {
        return $this->hasOne(Service::class, 'category_id');
    }
    public function trendingService()
    {
        return $this->belongsTo(TrendingService::class, 'category_id', 'category_id');
    }
    public function liked_services()
     {
         return $this->hasMany(Likedservice::class, 'service_id');
     }
    
    public static function getSellerInfosWithPromotions($sellerInfoIds, $perPage = 6)
    {
        $categoryIds = DB::table('promotions')
            ->whereIn('package1', $sellerInfoIds)
            ->pluck('package1')
            ->toArray();

        $otherSellerInfoIds = array_diff($sellerInfoIds, $categoryIds);
        $query = self::leftJoin('promotions', 'sellerinfos.id', '=', 'promotions.package1')
            ->select('sellerinfos.*');

        if (!empty($categoryIds)) {
            $query->orderByRaw("
                CASE
                    WHEN sellerinfos.id IN (" . implode(',', $categoryIds) . ") THEN 0
                    ELSE 1
                END, google_rating DESC, company_name ASC
            ");
        } 
        else {
            $query->orderBy('google_rating', 'desc')
                ->orderBy('company_name', 'asc');
        }

        return $query->whereIn('sellerinfos.id', array_merge($categoryIds, $otherSellerInfoIds))
            ->paginate($perPage);
    
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class,'seller_id');
    }
    // Will do it later
    public static function getSellerInfosWithPromotionsByParentId($parent_id, $perPage = 6)
    {
        $categoryIds = DB::table('promotions')->where('parent_id', $parent_id)
            ->pluck('category_id')
            ->toArray();

        return self::whereIn('category_id', $categoryIds)
            ->leftJoin('promotions AS promotion1', 'sellerinfos.category_id', '=', 'promotion1.package1')
            ->leftJoin('promotions AS promotion2', 'sellerinfos.category_id', '=', 'promotion2.package2')
            ->leftJoin('promotions AS promotion3', 'sellerinfos.category_id', '=', 'promotion3.package3')
            ->select(
                'sellerinfos.*',
                DB::raw('
                    CASE
                        WHEN sellerinfos.category_id = promotion1.package1 THEN 1
                        WHEN sellerinfos.category_id = promotion2.package2 THEN 2
                        WHEN sellerinfos.category_id = promotion3.package3 THEN 3
                        ELSE 0
                    END AS case_condition
                ')
            )
            ->orderBy('google_rating', 'desc')
            ->orderBy('company_name', 'asc')
            ->paginate($perPage);
    }
    // bijay start
    public function callbackEnquiries()
    {
        return $this->hasMany(Callback_enquiry::class, 'seller_id');
    }

    public function serviceEnquiries()
    {
        return $this->hasMany(Service_enquiry::class, 'seller_id');
    }

    public function likedService()
    {
        return $this->hasMany(Likedservice::class, 'service_id');
    }

    public function bestDeal()
    {
        return $this->hasMany(ProspectLead::class, 'seller_id');
    }
    // bijay end
}
