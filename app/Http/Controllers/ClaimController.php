<?php

namespace App\Http\Controllers;

use App\Models\Claimedrequest;
use App\Models\Sellerinfo;
use App\Models\Service;
use Illuminate\Http\Request;

class ClaimController extends Controller
{
    public function checkClaimStatus($service_id) {
       
        $claimStatus = Service::where('id', $service_id)->value('claim_status');
        // $claimStatus = Sellerinfo::where('id', $seller_id)->value('claim_status');
    
        return response()->json(['status' => $claimStatus]);
    }
}
