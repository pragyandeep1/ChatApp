<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Session;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function ratings(){
        Session()->put('page', 'ratings');
        $ratings = Rating::with(['user','sellerinfo'])->get()->toArray();
        return view('layouts.admin_layout.ratings',compact('ratings'));
    }
    public function updateRatingstatus(Request $request){
        $service = Rating::find($request->id);
        $service->status = $request->status;
        // $service->status = $request->status;
        $service->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }
    // public function updateRatingstatus(Request $request){
    //     if ($request->ajax()) {
    //        $data = $request->all();
    //        if ($data['status'] == 'active') {
    //          $status =0;
    //        }else{
    //         $status =1;
    //        }
    //        Rating::where('id',$data['rating_id'])->update(['status'=>$status]);
    //        return   response()->json(['status'=>$status,'rating_id'=>$data['rating_id']]);
    //     }
    // }
}
