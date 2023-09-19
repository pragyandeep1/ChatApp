<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Callback_enquiry;
use App\Models\ChatMessage;
use App\Models\Sellerinfo;
use App\Models\Service_enquiry;
use App\Models\Likedservice;
use App\Models\ProspectLead;

class CrmController extends Controller
{
    public function call_me_back(){
        $call_me_back =  Callback_enquiry::where('history_status',0)->paginate(5);
        $count = Callback_enquiry::where('history_status',0)->count();
        return view('layouts.admin_layout.call_me_back',compact('count','call_me_back'));
    }


    public function seller_call_me_back(){
        $seller = Auth::user()->name;
        $seller_email = Auth::user()->email;
        $mobile = Auth::user()->mobile;
        $seller_info = Sellerinfo::where('email',$seller_email)->orWhere('company_name',$seller)->orWhere('phone',$mobile)->first();
     // return $seller;
        $call_me_back =  Callback_enquiry::where('history_status',0)->where('seller_id',$seller_info->id)->paginate(5);
        $count = Callback_enquiry::where('history_status',0)->count();
        return view('layouts.admin_layout.seller_call_me_back',compact('count','call_me_back'));
    }

    public function seller_call_me_back_delete($id){
         $call_me_back = Callback_enquiry::find($id);
         $call_me_back->delete();
         return redirect('/seller-call-me-back')->with('status', 'Data deleted successfully');
    }

    public function service_enquiry(){
        $service_enquiry =  Service_enquiry::where('history_status',0)->paginate(5);
        $count = Service_enquiry::where('history_status',0)->count();
        return view('layouts.admin_layout.service_enquiry',compact('count','service_enquiry'));
    }

    public function seller_service_enquiry(){
        $seller = Auth::user()->name;
        $seller_email = Auth::user()->email;
        $mobile = Auth::user()->mobile;
        $seller_info = Sellerinfo::where('email',$seller_email)->orWhere('company_name',$seller)->orWhere('phone',$mobile)->first();
        $service_enquiry =  Service_enquiry::where('history_status',0)->where('seller_id',$seller_info->id)->paginate(5);
        $count = Service_enquiry::where('history_status',0)->count();
        return view('layouts.admin_layout.seller_service_enquiry',compact('count','service_enquiry'));
    }

    public function liked_service(){
        $liked_service =  Likedservice::leftjoin('users','users.id','liked_services.user_id')
        ->select('liked_services.*','users.name','users.mobile')
        ->where('liked_services.history_status',0)
        ->paginate(5);
        $count = Likedservice::where('history_status',0)->count();
        // return $liked_service;
        return view('layouts.admin_layout.liked_service',compact('count','liked_service'));
    }

    public function seller_liked_service(){
        $seller = Auth::user()->name;
        $seller_email = Auth::user()->email;
        $mobile = Auth::user()->mobile;
        $seller_info = Sellerinfo::where('email',$seller_email)->orWhere('company_name',$seller)->orWhere('phone',$mobile)->first();
        $liked_service =  Likedservice::leftjoin('users','users.id','liked_services.user_id')
        ->select('liked_services.*','users.name','users.mobile')
        ->where('liked_services.service_id',$seller_info->id)
        ->where('liked_services.history_status',0)
        ->paginate(5);
        $count = Likedservice::where('history_status',0)->count();
        return view('layouts.admin_layout.seller_liked_service',compact('count','liked_service'));
    }

    public function chat_enquiry(){
        $today_date = date('Y-m-d');
        $chat_enquiry =  ChatMessage::leftjoin('users','users.id','chat_messages.user_id')
        ->select('chat_messages.*','users.name','users.mobile')
        ->groupBy('chat_messages.seller_name')
        ->whereDate('chat_messages.created_at',$today_date)
        ->where('chat_messages.history_status', 0)
        ->paginate(5);
        $count = ChatMessage::where('history_status',0)->count();
        return view('layouts.admin_layout.chat_enquiry',compact('count','chat_enquiry'));
    }

    public function seller_chat_enquiry(){
        $today_date = date('Y-m-d');
        $seller = Auth::user()->name;
        $seller_email = Auth::user()->email;
        $mobile = Auth::user()->mobile;
        $seller_info = Sellerinfo::where('email',$seller_email)->orWhere('company_name',$seller)->orWhere('phone',$mobile)->first();
        $chat_enquiry =  ChatMessage::leftjoin('users','users.id','chat_messages.user_id')
        ->select('chat_messages.*','users.name','users.mobile')
        ->where('chat_messages.seller_id',$seller_info->id)
        ->groupBy('chat_messages.seller_name')
        ->whereDate('chat_messages.created_at',$today_date)
        ->where('chat_messages.history_status',0)
        ->paginate(5);
        $count = ChatMessage::where('history_status',0)->count();
        return view('layouts.admin_layout.seller_chat_enquiry',compact('count','chat_enquiry'));
    }

    public function best_deal(){
        $best_deal =  ProspectLead::leftjoin('users','users.id','prospect_leads.user_id')
        ->select('prospect_leads.*','users.name')
        ->where('prospect_leads.history_status',0)
        ->paginate(5);
        $count = ProspectLead::where('history_status',0)->count();
        // return $liked_service;
        return view('layouts.admin_layout.best_deal',compact('count','best_deal'));
    }

    public function seller_best_deal(){
        $seller = Auth::user()->name;
        $seller_email = Auth::user()->email;
        $mobile = Auth::user()->mobile;
        $seller_info = Sellerinfo::where('email',$seller_email)->orWhere('company_name',$seller)->orWhere('phone',$mobile)->first();
        $best_deal =  ProspectLead::leftjoin('users','users.id','prospect_leads.user_id')
        ->select('prospect_leads.*','users.name')
        ->where('prospect_leads.seller_id',$seller_info->id)
        ->where('prospect_leads.history_status',0)
        ->paginate(5);
        $count = ProspectLead::where('history_status',0)->count();
        return view('layouts.admin_layout.seller_best_deal',compact('count','best_deal'));
    }


    public function call_me_back_delete($id){
         $call_me_back = Callback_enquiry::find($id);
         $call_me_back->delete();
         return redirect('/call-me-back')->with('status', 'Data deleted successfully');
    }

    public function service_delete($id){
        $service_enquiry = Service_enquiry::find($id);
        $service_enquiry->delete();
        return redirect('/service-enquiry')->with('status', 'Data deleted successfully');
   }

   public function liked_service_delete($id){
    $liked_service = Likedservice::find($id);
    $liked_service->delete();
    return redirect('/liked-service')->with('status', 'Data deleted successfully');
}

public function chat_enquiry_delete($id){
    $chat_message = ChatMessage::find($id);
    $chat_message->delete();
    return redirect('/chat-enquiry')->with('status', 'Data deleted successfully');
}

public function best_deal_delete($id){
    $best_deal = ProspectLead::find($id);
    $best_deal->delete();
    return redirect('/best-deal')->with('status', 'Data deleted successfully');
}


public function call_me_back_history_delete($id){
    $call_me_back = Callback_enquiry::find($id);
    $call_me_back->delete();
    return redirect('/call-me-back-history')->with('status', 'Data deleted successfully');
}

public function service_history_delete($id){
   $service_enquiry = Service_enquiry::find($id);
   $service_enquiry->delete();
   return redirect('/service-enquiry-history')->with('status', 'Data deleted successfully');
}

public function liked_service_history_delete($id){
$liked_service = Likedservice::find($id);
$liked_service->delete();
return redirect('/liked-service-history')->with('status', 'Data deleted successfully');
}

public function chat_enquiry_history_delete($id){
$chat_message = ChatMessage::find($id);
$chat_message->delete();
return redirect('/today-chat-history')->with('status', 'Data deleted successfully');
}

public function best_deal_history_delete($id){
$best_deal = ProspectLead::find($id);
$best_deal->delete();
return redirect('/best-deal-history')->with('status', 'Data deleted successfully');
}


public function call_me_back_update($id){
    Callback_enquiry::where('id', $id)->update(['history_status' => 1]);
    return redirect('/call-me-back-history')->with('status', 'Data updated successfully');
}

public function seller_enquiry_update($id){
    Service_enquiry::where('id', $id)->update(['history_status' => 1]);
    return redirect('/seller-enquiry-history')->with('status', 'Data update successfully');
}

public function liked_service_update($id){
    Likedservice::where('id', $id)->update(['history_status' => 1]);
    return redirect('/liked-service-history')->with('status', 'Data update successfully');
}
public function today_chat_update($id){
    ChatMessage::where('id', $id)->update(['history_status' => 1]);
    return redirect('/today-chat-history')->with('status', 'Data update successfully');
}
public function best_deal_update($id){
    ProspectLead::where('id', $id)->update(['history_status' => 1]);
    return redirect('/best-deal-history')->with('status', 'Data update successfully');
}



public function seller_call_me_back_update($id){
    Callback_enquiry::where('id', $id)->update(['history_status' => 1]);
    return redirect('/seller-call-me-back-history')->with('status', 'Data updated successfully');
}

public function seller_service_enquiry_update($id){
    Service_enquiry::where('id', $id)->update(['history_status' => 1]);
    return redirect('/seller-service-enquiry-history')->with('status', 'Data update successfully');
}
public function seller_liked_service_update($id){
    Likedservice::where('id', $id)->update(['history_status' => 1]);
    return redirect('/seller-liked-service-history')->with('status', 'Data update successfully');
}
public function seller_today_chat_update($id){
    ChatMessage::where('id', $id)->update(['history_status' => 1]);
    return redirect('/seller-today-chat-history')->with('status', 'Data update successfully');
}
public function seller_best_deal_update($id){
    ProspectLead::where('id', $id)->update(['history_status' => 1]);
    return redirect('/seller-best-deal-history')->with('status', 'Data update successfully');
}



public function call_me_back_history(){
    $call_me_back =  Callback_enquiry::where('history_status',1)->paginate(5);
    $count = Callback_enquiry::where('history_status',1)->count();
    return view('layouts.admin_layout.call_me_back_history',compact('call_me_back','count'));
}

public function seller_enquiry_history(){
    $service_enquiry =  Service_enquiry::where('history_status',1)->paginate(5);
    $count = Service_enquiry::where('history_status',1)->count();
    return view('layouts.admin_layout.seller_enquiry_history',compact('service_enquiry','count'));
}

public function liked_service_history(){
    $liked_service =  Likedservice::leftjoin('users','users.id','liked_services.user_id')
        ->select('liked_services.*','users.name','users.mobile')
        ->where('liked_services.history_status',1)
        ->paginate(5);
    $count = Likedservice::where('history_status',1)->count();
    return view('layouts.admin_layout.liked_service_history',compact('liked_service','count'));
}
public function today_chat_history(){
    $today_date = date('Y-m-d');
    $today_chat =  ChatMessage::leftjoin('users','users.id','chat_messages.user_id')
        ->select('chat_messages.*','users.name','users.mobile')
        ->groupBy('chat_messages.seller_name')
        ->whereDate('chat_messages.created_at',$today_date)
        ->where('chat_messages.history_status',1)
        ->paginate(5);
    $count = ChatMessage::where('history_status',1)->count();
    return view('layouts.admin_layout.today_chat_history',compact('today_chat','count'));
}
public function best_deal_history(){
    $best_deal =  ProspectLead::where('history_status',1)->paginate(5);
    $count = ProspectLead::where('history_status',1)->count();
    return view('layouts.admin_layout.best_deal_history',compact('best_deal','count'));
}



public function call_me_back_reopen($id){
    Callback_enquiry::where('id', $id)->update(['history_status' => 0]);
    return redirect('/call-me-back')->with('status', 'Data updated successfully');
}
public function seller_enquiry_reopen($id){
    Service_enquiry::where('id', $id)->update(['history_status' => 0]);
    $count = Service_enquiry::count();
    return redirect('/service-enquiry')->with('status', 'Data updated successfully');
}
public function liked_service_reopen($id){
    Likedservice::where('id', $id)->update(['history_status' => 0]);
    return redirect('/liked-service')->with('status', 'Data update successfully');
}
public function today_chat_reopen($id){
    ChatMessage::where('id', $id)->update(['history_status' => 0]);
    return redirect('/chat-enquiry')->with('status', 'Data update successfully');
}
public function best_deal_reopen($id){
    ProspectLead::where('id', $id)->update(['history_status' => 0]);
    return redirect('/best-deal')->with('status', 'Data update successfully');
}



public function seller_call_me_back_reopen($id){
    Callback_enquiry::where('id', $id)->update(['history_status' => 0]);
    return redirect('/seller-call-me-back')->with('status', 'Data updated successfully');
}
public function seller_service_enquiry_reopen($id){
    Service_enquiry::where('id', $id)->update(['history_status' => 0]);
    $count = Service_enquiry::count();
    return redirect('/seller-service-enquiry')->with('status', 'Data updated successfully');
}
public function seller_liked_service_reopen($id){
    Likedservice::where('id', $id)->update(['history_status' => 0]);
    return redirect('/seller-liked-service')->with('status', 'Data update successfully');
}
public function seller_today_chat_reopen($id){
    ChatMessage::where('id', $id)->update(['history_status' => 0]);
    return redirect('/seller-chat-enquiry')->with('status', 'Data update successfully');
}
public function seller_best_deal_reopen($id){
    ProspectLead::where('id', $id)->update(['history_status' => 0]);
    return redirect('/seller-best-deal')->with('status', 'Data update successfully');
}



public function seller_call_me_back_history(){
        $seller = Auth::user()->name;
        $seller_email = Auth::user()->email;
        $mobile = Auth::user()->mobile;
        $seller_info = Sellerinfo::where('email',$seller_email)->orWhere('company_name',$seller)->orWhere('phone',$mobile)->first();
     // return $seller;
        $call_me_back =  Callback_enquiry::where('history_status',1)->where('seller_id',$seller_info->id)->paginate(5);
        $count = Callback_enquiry::where('history_status',1)->count();
    return view('layouts.admin_layout.seller_call_me_back_history',compact('call_me_back','count'));
}

public function seller_service_enquiry_history(){
        $seller = Auth::user()->name;
        $seller_email = Auth::user()->email;
        $mobile = Auth::user()->mobile;
        $seller_info = Sellerinfo::where('email',$seller_email)->orWhere('company_name',$seller)->orWhere('phone',$mobile)->first();
        $service_enquiry =  Service_enquiry::where('history_status',1)->where('seller_id',$seller_info->id)->paginate(5);
        $count = Service_enquiry::where('history_status',1)->count();
    return view('layouts.admin_layout.seller_service_enquiry_history',compact('service_enquiry','count'));
}
public function seller_liked_service_history(){
    $seller = Auth::user()->name;
        $seller_email = Auth::user()->email;
        $mobile = Auth::user()->mobile;
        $seller_info = Sellerinfo::where('email',$seller_email)->orWhere('company_name',$seller)->orWhere('phone',$mobile)->first();
        $liked_service =  Likedservice::leftjoin('users','users.id','liked_services.user_id')
        ->select('liked_services.*','users.name','users.mobile')
        ->where('liked_services.service_id',$seller_info->id)
        ->where('liked_services.history_status',1)
        ->paginate(5);
        $count = Likedservice::where('history_status',1)->count();
    return view('layouts.admin_layout.seller_liked_service_history',compact('liked_service','count'));
}

public function seller_today_chat_history(){
    $today_date = date('Y-m-d');
        $seller = Auth::user()->name;
        $seller_email = Auth::user()->email;
        $mobile = Auth::user()->mobile;
        $seller_info = Sellerinfo::where('email',$seller_email)->orWhere('company_name',$seller)->orWhere('phone',$mobile)->first();
        $today_chat =  ChatMessage::leftjoin('users','users.id','chat_messages.user_id')
        ->select('chat_messages.*','users.name','users.mobile')
        ->where('chat_messages.seller_id',$seller_info->id)
        ->groupBy('chat_messages.seller_name')
        ->whereDate('chat_messages.created_at',$today_date)
        ->where('chat_messages.history_status',1)
        ->paginate(5);
        $count = ChatMessage::where('history_status',1)->count();
    return view('layouts.admin_layout.seller_today_chat_history',compact('today_chat','count'));
}
public function seller_best_deal_history(){
    $seller = Auth::user()->name;
    $seller_email = Auth::user()->email;
    $mobile = Auth::user()->mobile;
    $seller_info = Sellerinfo::where('email',$seller_email)->orWhere('company_name',$seller)->orWhere('phone',$mobile)->first();
    $best_deal =  ProspectLead::leftjoin('users','users.id','prospect_leads.user_id')
    ->select('prospect_leads.*','users.name')
    ->where('prospect_leads.seller_id',$seller_info->id)
    ->where('prospect_leads.history_status',1)
    ->paginate(5);
    $count = ProspectLead::where('history_status',1)->count();
    return view('layouts.admin_layout.seller_best_deal_history',compact('best_deal','count'));
}

}
