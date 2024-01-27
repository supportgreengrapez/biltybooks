<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admin;
use App\User;
use DB;
use App\cashtransaction;
use App\historycashtransaction;
class adminController extends Controller
{
    public function login_view()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
       $a =  admin::where('email',$request->input('username'))->get()->first();   
    if(!empty($a))
       {
           if(md5($request->input('password'))==$a->password)
       {
           session()->put('username',$a->email);
           session()->put('fname',$a->fname);
           session()->put('lname',$a->lname);
           session()->put('user_type','admin');
           return redirect('/admin-dashboard');
       }
       else
       {
           return redirect()->back()->with('loginerror',"Wrong username or password");;
       }
       }
       else
       {
           return redirect('/admin')->with('loginerror',"Wrong username or password");
       }
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function view_user_list()
    {
        $u = User::all();
        return view('admin.view_user',compact('u'));
    }

    public function user_detail($id)
    {
        $user = User::find($id);
       
        return view('admin.user_detail',compact('user'));
    }

    public function logout()
    {
        session()->flush();
        return redirect('admin');
    }
    public function cash_pending_transaction_view()
    {
        $c = db::select("select cashtransactions.created_at as d,cashtransactions.subscription as cs,cashtransactions.id as cid,cashtransactions.*,users.* from cashtransactions,users where users.id = cashtransactions.user_id and cashtransactions.status='pending'");
        return view('admin.pending_cash_transactions',compact('c'));
    }
    public function cash_declined_transaction_view()
    {
        $c = db::select("select cashtransactions.created_at as d,cashtransactions.subscription as cs,cashtransactions.id as cid,cashtransactions.*,users.* from cashtransactions,users where users.id = cashtransactions.user_id and cashtransactions.status='declined'");
        return view('admin.declined_cash_transactions',compact('c'));
    }

    public function cash_transaction_approve($id)
    {
        $c = cashtransaction::find($id);
        $c->status = "completed";
        $customer_id =  $c->user_id;
        $subs  = $c->subscription;
        $c->save();

        $status ="complete";
        DB::update("update historycashtransactions set status = '$status' where cash_id = '$id'");
        DB::update("update users set subscription = '$subs',s_created =CURRENT_TIMESTAMP(),mode_of_payment='cash',subscription_status='1' where id = '$customer_id'");
        DB::update("update susers set status = '1' where o_id = '$customer_id'");
        return redirect('/admin-cash-transaction-complete')->with('message',"You have successfully approved a cash payment");
        
    }

    public function cash_transaction_decline_view($id)
    {
       return view('admin.decline_reason',compact('id'));
    }

    public function cash_transaction_decline($id,Request $request)
    {
        $c = cashtransaction::find($id);

        $c->reason = $request->input('reason');
        $c->status = "declined";
        $c->save();
        
        
        $status ="declined";
        DB::update("update historycashtransactions set status = '$status' where cash_id = '$id'");
        return redirect('/admin-cash-declined-transactions')->with('message','The transaction is successfully marked as declined');
    }
    public function cash_transaction_complete()
    {
        $c = db::select("select cashtransactions.created_at as d,cashtransactions.subscription as cs,cashtransactions.id as cid,cashtransactions.*,users.* from cashtransactions,users where users.id = cashtransactions.user_id and cashtransactions.status='completed'");
        return view('admin.cash_transactions',compact('c'));
    }
    public function paypal_transaction_complete()
    {
        $c = db::select("select paypaltransactions.created_at as d,paypaltransactions.subscription as cs,paypaltransactions.id as cid,paypaltransactions.*,users.* from paypaltransactions,users where users.id = paypaltransactions.user_id and paypaltransactions.status='completed'");
        return view('admin.paypal_transactions',compact('c'));
    }
    public function getTransactionsByDate(Request $request,$type)
    {
       $start_date = $request->input('start_date');
       $end_date = $request->input('end_date');
      if(empty($start_date))
      {
          if($type=="complete")
           {
               return redirect('/admin-cash-transaction-complete')->with('emessage','The Start Date can not be empty');
           }
           else if($type=="pending")
           {
           return redirect('/admin-cash-pending-transactions')->with('emessage','The Start Date can not be empty');
           }
           else if($type="declined")
           {
           return redirect('/admin-cash-declined-transactions')->with('emessage','The Start Date can not be empty');
           }
      }
      if(empty($end_date))
      {
        if($type=="complete")
        {
           return redirect('/admin-cash-transaction-complete')->with('emessage','The Start Date can not be empty');
        }
        else if($type=="pending")
        {
        return redirect('/admin-cash-pending-transactions')->with('emessage','The Start Date can not be empty');
        }
        else if($type="declined")
        {
       return  redirect('/admin-cash-declined-transactions')->with('emessage','The Start Date can not be empty');
        }
      }
if($type=="complete")
{
       $c = db::select("select cashtransactions.created_at as d,cashtransactions.subscription as cs,cashtransactions.id as cid,cashtransactions.*,users.* from cashtransactions,users where users.id = cashtransactions.user_id and cashtransactions.status='completed' and (cashtransactions.created_at BETWEEN '$start_date 00:00:00' and '$end_date 23:59:59') ORDER BY cashtransactions.id DESC");
       return view('admin.cash_transactions',compact('c'));
}
else if($type=="pending")
{
    $c = db::select("select cashtransactions.created_at as d,cashtransactions.subscription as cs,cashtransactions.id as cid,cashtransactions.*,users.* from cashtransactions,users where users.id = cashtransactions.user_id and cashtransactions.status='pending' and (cashtransactions.created_at BETWEEN '$start_date 00:00:00' and '$end_date 23:59:59') ORDER BY cashtransactions.id DESC");
    return view('admin.pending_cash_transactions',compact('c'));
}
else if($type=="declined")
{
    $c = db::select("select cashtransactions.created_at as d,cashtransactions.subscription as cs,cashtransactions.id as cid,cashtransactions.*,users.* from cashtransactions,users where users.id = cashtransactions.user_id and cashtransactions.status='declined' and (cashtransactions.created_at BETWEEN '$start_date 00:00:00' and '$end_date 23:59:59') ORDER BY cashtransactions.id DESC");
    return view('admin.declined_cash_transactions',compact('c'));
}
    }
    
    public function getPayPalTransactionsByDate(Request $request)
    {
        $start_date = $request->input('start_date');
       $end_date = $request->input('end_date');
      if(empty($start_date))
      {
         
           return redirect('/admin-paypal-transaction-complete')->with('emessage','The Start Date can not be empty');
           
      }
      if(empty($end_date))
      {
       
       return  redirect('/admin-paypal-transaction-complete')->with('emessage','The Start Date can not be empty');
        
      }
      
       $c = db::select("select paypaltransactions.created_at as d,paypaltransactions.subscription as cs,paypaltransactions.id as cid,paypaltransactions.*,users.* from paypaltransactions,users where users.id = paypaltransactions.user_id and paypaltransactions.status='completed' and (paypaltransactions.created_at BETWEEN '$start_date 00:00:00' and '$end_date 23:59:59') ORDER BY paypaltransactions.id DESC");
       return view('admin.paypal_transactions',compact('c'));
        
    }
}
