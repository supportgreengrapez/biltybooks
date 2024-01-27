<?php
namespace App\Http\Controllers;
use Auth;
use Redirect;
use Illuminate\Http\Request;
use App\User;
use App\Susers;
use App\biltyrecord;
use DB;
use Hash;
use App\trial_used;
use Mail;
use DateTime;
use App\cashtransaction;
use App\historycashtransaction;
class clientController extends Controller
{
    public function search_report(Request $request)
    {
        $id = 1;

        if (session()->get('type') == "client_owner")
        {

            $id = Auth::user()->id;

        }
        else if (session()
            ->get('type') == "client_user")
        {
            $id = session()->get('id');

            $o_id = Susers::find($id);

            $id = $o_id->o_id;

        }

        //   $bilty_no_to = $request->input('bilty_no_to');
        $bilty_no_from = $request->input('bilty_no_from');

        $bilty_charges_to = $request->input('bilty_charges_to');

        //  $bilty_charges_from = $request->input('bilty_charges_from');
        //      $bundle_to = $request->input('bundle_to');
        $bundle_from = $request->input('bundle_from');

        //      $quantity_to = $request->input('quantity_to');
        $quantity_from = $request->input('quantity_from');

        $date_of_booking_to = $request->input('date_of_booking_to');

        $date_of_booking_from = $request->input('date_of_booking_from');

        $date_of_receiving_to = $request->input('date_of_receiving_to');

        $date_of_receiving_from = $request->input('date_of_receiving_from');

        $to_record = $request->input('to_record');

        $sender_name = $request->input('sender_name');

        $receiver_name = $request->input('receiver_name');

        $sender_city = $request->input('sender_city');
        $receiver_city = $request->input('receiver_city');

        $goods_company = $request->input('goods_company');

        $bilty_type = $request->input('bilty_type');

        $sql = "Select* from biltyrecords where ";

        $check = 0;

        if ($request->input('bilty_no_check'))
        {
            $sql .= "bilty_number = '$bilty_no_from' ";
            $check = 1;
        }
        if ($request->input('bilty_charges_check'))
        {
            if ($check == 1)
            {
                $sql .= "and bilty_charges = '$bilty_charges_to' ";
            }
            else
            {
                $sql .= "bilty_charges = '$bilty_charges_to' ";
                $check = 1;
            }
        }
        if ($request->input('sender_name_check'))
        {
            if ($check == 1)
            {
                $sql .= "and sender_company='$sender_name' ";
            }
            else
            {
                $sql .= "sender_company='$sender_name' ";
                $check = 1;
            }
        }
        if ($request->input('bundle_check'))
        {
            if ($check == 1)
            {
                $sql .= "and  bundles = '$bundle_from' ";
            }
            else
            {
                $sql .= " bundles = '$bundle_from' ";
                $check = 1;
            }
        }
        if ($request->input('quantity_check'))
        {
            if ($check == 1)
            {
                $sql .= "and  quantity = '$quantity_from' ";
            }
            else
            {
                $sql .= "quantity = '$quantity_from' ";
                $check = 1;
            }
        }
        if ($request->input('receiver_name_check'))
        {
            if ($check == 1)
            {
                $sql .= "and receiver_company='$receiver_name' ";
            }
            else
            {
                $sql .= "receiver_company='$receiver_name' ";
                $check = 1;
            }
        }

        if ($request->input('bilty_type_check'))
        {
            if ($check == 1)
            {
                $sql .= "and bilty_type='$bilty_type' ";
            }
            else
            {
                $sql .= "bilty_type='$bilty_type' ";
                $check = 1;
            }
        }

        if ($request->input('date_of_booking_check'))
        {
            if ($check == 1)
            {
                $sql .= "and (date_of_booking < '$date_of_booking_to' or date_of_booking = '$date_of_booking_to' ) and (date_of_booking ='$date_of_booking_from' or date_of_booking > '$date_of_booking_from' ) ";
            }
            else
            {
                $sql .= "(date_of_booking < '$date_of_booking_to' or date_of_booking = '$date_of_booking_to' ) and (date_of_booking > '$date_of_booking_from' or date_of_booking = '$date_of_booking_from' ) ";

                $check = 1;
            }
        }
        if ($request->input('date_of_receiving_check'))
        {
            if ($check == 1)
            {
                $sql .= "and date_of_receiving <= '$date_of_receiving_to' and date_of_receiving >= '$date_of_receiving_from' ";
            }
            else
            {
                $sql .= "date_of_receiving <= '$date_of_receiving_to' and date_of_receiving >= '$date_of_receiving_from' ";
                $check = 1;
            }
        }
        if ($request->input('sender_city_check'))
        {
            if ($check == 1)
            {
                $sql .= "and sender_city='$sender_city' ";
            }
            else
            {
                $sql .= "sender_city='$sender_city' ";
                $check = 1;
            }
        }
        if ($request->input('receiver_city_check'))
        {
            if ($check == 1)
            {
                $sql .= "and receiver_city='$receiver_city' ";
            }
            else
            {
                $sql .= "receiver_city='$receiver_city' ";
                $check = 1;
            }
        }
        if ($request->input('charges_to_check'))
        {
            if ($check == 1)
            {
                $sql .= "and charge_to='$charges_to' ";
            }
            else
            {
                $sql .= "charge_to='$charges_to' ";
                $check = 1;
            }
        }
        if ($request->input('to_record_check'))
        {
            if ($check == 1)
            {
                $sql .= "and to_record='$to_record' ";
            }
            else
            {
                $sql .= "to_record='$to_record' ";
                $check = 1;
            }
        }
        if ($request->input('goods_company_check'))
        {
            if ($check == 1)
            {
                $sql .= "and goods_company='$goods_company'";
            }
            else
            {
                $sql .= "goods_company='$goods_company'";
                $check = 1;
            }
        }
        if ($check == 1) $sql .= " and o_id = '$id'";
        else
        {
            $sql .= " o_id = '$id'";
        }
        return $this->reports('filter', $sql);
    }

    //   public function getreportByDate(Request $request)
    // {
    //     $start_date = $request->input('start_date');
    //   $end_date = $request->input('end_date');
    //   if(empty($start_date))
    //   {
    //       return redirect('/biltyrecords-report')->with('emessage','The Start Date can not be empty');
    //   }
    //   if(empty($end_date))
    //   {
    //   return  redirect('/biltyrecords-report')->with('emessage','The Start Date can not be empty');
    //   }
    //   $records = db::select("select* from biltyrecords  where (date_of_booking = '$start_date' or date_of_booking > '$start_date')  and (date_of_receiving = '$end_date' or date_of_receiving < '$end_date') ");
    

    //   return view('client.report',compact('records'));
    // }
    public function profile_edit(Request $request)
    {
        session()->put('name', $request->input('fname') . ' ' . $request->input('lname'));

        $u = user::find(Auth::user()->id);

        $u->fname = $request->input('fname');
        $u->lname = $request->input('lname');
        if ($request->input('password') == "null")
        {
            $u->save();
            return redirect()
                ->back()
                ->with('message', 'Your Profile has been updated Successfully');
        }
        else if ($request->input('password') != "null")
        {
            $u->password = bcrypt($request->input('password'));
            $u->save();
            return redirect()
                ->back()
                ->with('message', 'Your Profile and Password has been updated Successfully');
        }

    }
    public function profile_edit_view()
    {
        $user = Auth::user();

        return view('client.profile_edit', compact('user'));

    }
    public function password_change(Request $request, $username)
    {
        $password = bcrypt($request->input('password'));
        DB::update("update users set password ='$password' where username='$username'");
        return redirect('login')->with('message', 'Your Password has been changed Successfully');
    }
    public function verify_code($username, $code)
    {
        $result = DB::select("select* from reset_password where username= '$username' and verification_code= '$code' and TIMESTAMPDIFF(MINUTE,reset_password.created_at,NOW()) <=30 ");

        if (count($result) > 0)
        {
            return view('change_password', compact('username'));
        }
        else return "The Verification code is expired";
    }
    public function reset_password_view()
    {

        return view('password_reset');

    }

    public function reset_password(Request $request)
    {

        $username = $request->input('email');
        $result = DB::select("select* from users where username = '$username'");
        if (count($result) > 0)
        {
            $vcode = uniqid();
            DB::insert("insert into reset_password (username,verification_code) values('$username','$vcode') ");
            $customer_name = $result[0]->{'fname'} . ' ' . $result[0]->{'lname'};
            $data = array(
                'customer_name' => $customer_name,
                'customer_username' => $username,
                'customer_verification_code' => $vcode,

            );
            Mail::send('email.password_reset', $data, function ($message) use ($username)
            {

                $message->from('no-reply@biltybooks.com', 'BiltyBooks');

                $message->to($username)->subject('Password Reset');

            });
            return redirect()
                ->back()
                ->with('message', 'A Password reset link sent to your email');
        }
        else
        {
            return Redirect::back()
                ->withErrors('Username not found');
        }

    }

    public function checkIfLogin()
    {
        return redirect('/login');
    }
    public function home()
    {
        if (session()
            ->has('id') && Auth::check())
        {
            return redirect('/dashboard');
        }
        return view('index');
    }

    public function login_view()
    {
        return view('login');
    }
    public function register_view()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        if (count(user::where('username', $request->input('username'))
            ->get()) > 0)

        {
            return redirect('/register')
                ->with('error', 'Username is already Exists');
        }
        if ($request->input('password') != $request->input('cpassword'))
        {
            return redirect('/register')
                ->with('error', 'Your Password does not Match with Confirm Password');
        }
        $user = new User();
        $user->username = $request->input('username');
        $user->fname = $request->input('fname');
        $user->lname = $request->input('lname');
        $user->password = bcrypt($request->input('password'));
        $user->country = $request->input('country');
        $user->city = $request->input('city');
        $user->phone_number = $request->input('ph');
        $user->save();

        return redirect('/login')
            ->with('success', 'You are Successfully Registered');
    }
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        if (count(user::where('username', $username)->get()) > 0)
        {

            $userdata = array(
                'username' => $username,
                'password' => $password
            );

            if (Auth::attempt($userdata))
            {

                session()->put('username', $username);
                session()->put('type', 'client_owner');
                session()
                    ->put('edit_permission', '1');
                session()
                    ->put('delete_permission', '1');

                $u = user::where('username', $username)->first();
                session()
                    ->put('subscription', $u->subscription);
                session()
                    ->put('id', $u->id);
                session()
                    ->put('name', $u->fname . ' ' . $u->lname);

                return redirect('/dashboard');
            }
            else return redirect('/login')
                ->with('error', 'Username or Password is incorrect');
        }
        else if (count(Susers::where([['username', '=', $username], ['status', '=', 1]])->get()) > 0)
        {
            $u = Susers::where('username', $username)->first();

            if (Hash::check($password, $u->password))
            {
                session()
                    ->put('username', $username);
                session()->put('type', 'client_user');
                session()
                    ->put('id', $u->id);
                session()
                    ->put('name', $u->fname . ' ' . $u->lname);
                session()
                    ->put('edit_permission', $u->edit_permission);
                session()
                    ->put('delete_permission', $u->delete_permission);
                $id = session()->get('id');
                $o_id = Susers::find($id);

                $id = $o_id->o_id;
                $sub = user::find($id);
                session()->put('subscription', $sub->subscription);
                return redirect('/dashboard');
            }
            else return redirect('/login')
                ->with('error', 'Username or Password is incorrect');
        }
        else
        {
            return redirect('/login')
                ->with('error', 'Username or Password is incorrect');
        }
    }
    public function logout()
    {
        session()
            ->flush();

        return redirect('/login');
    }

    public function contact_form(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $message1 = $request->input('message');
   
        $data = array(
            'name' =>$name,
            'email'=> $email,
            'message1'=> $message1,     
        );
        Mail::send('email_contact_us', $data, function ($message) use ($email)
        {
            $message->from('no-reply@biltybooks.com', 'BiltyBooks');
            $message->to('kamran@kingfabrics.com')
                ->subject('Contact Us mail');
        });
        return redirect()->back()->with('message', 'Your message has been delivered successfully');
    }

    public function manage_users_view()
    {

        $id = Auth::user()->id;
        $su = Susers::all()->where('o_id', $id);
        return view('client.manage_users', compact('su'));
    }
    public function create_users_view()
    {
        return view('client.create_user');
    }
    public function dashboard()
    {

        date_default_timezone_set("Asia/Karachi");
        $date = date('Y-m-d');

        if (session('type') == "client_owner")
        {
            $id = Auth::user()->id;
            $in = 'in';
            $out = 'out';
            $m_user = Susers::where('o_id', $id)->count();
            $r_c = biltyrecord::where('o_id', $id)->count();
            $result = DB::select("select * from biltyrecords where bilty_type = '$in' and o_id = '$id'");
            $result = count($result);
            $out = DB::select("select * from biltyrecords where bilty_type = '$out' and o_id = '$id'");
            $out = count($out);
            return view('client.dashboard', compact('m_user', 'r_c', 'result', 'out'));
        }
        else
        {

            $id = session()->get('id');
            $o_id = Susers::find($id);
            $in = 'in';
            $out = 'out';
            $id = $o_id->o_id;
            $o_id = $id;

            $r_c = biltyrecord::where('o_id', $o_id)->count();

            $result = DB::select("select * from biltyrecords where bilty_type = '$in' and o_id = '$id'");
            $result = count($result);
            $out = DB::select("select * from biltyrecords where bilty_type = '$out' and o_id = '$id'");
            $out = count($out);
            return view('client.dashboard', compact('r_c', 'result', 'out'));
        }
    }

    public function create_users(Request $request)
    {

        if (count(susers::where('username', $request->input('username'))
            ->get()) > 0)
        {

            return redirect('create-users')
                ->with('message', 'The User Already Exist in System');
        }
        if ($request->input('password') != $request->input('cpassword'))
        {

            return redirect('create-users')
                ->with('message', 'Your Password does not Match with Confirm Password');
        }
        $sub = session()->get('subscription');
        if ($sub == "BASIC")
        {
            $count = count(susers::where('o_id', Auth::user()->id)
                ->get());
            if ($count - 3 == 0)
            {
                return redirect('manage-users')->with('message', 'you can not add more users, upgrade your subscription to add more.');

            }
        }
        else if ($sub == "ESSENTIAL")
        {
            $count = count(susers::where('o_id', Auth::user()->id)
                ->get());
            if ($count - 6 == 0)
            {
                return redirect('manage-users')->with('message', 'you can not add more users, upgrade your subscription to add more.');
            }
        }
        else if ($sub == "PRO")
        {
            $count = count(susers::where('o_id', Auth::user()->id)
                ->get());
            if ($count - 11 == 0)
            {
                return redirect('manage-users')->with('message', 'you can not add more users, upgrade your subscription to add more.');
            }
        }
        else if ($sub == "TRIAL")
        {
            $count = count(susers::where('o_id', Auth::user()->id)
                ->get());
            if ($count - 2 == 0)
            {
                return redirect('manage-users')->with('message', 'you can not add more users, upgrade your subscription to add more.');
            }
        }
        $su = new Susers();
        $su->o_id = Auth::user()->id;

        if ($request->input('edit'))
        {
            $su->edit_permission = '1';
        }
        if ($request->input('delete'))
        {
            $su->delete_permission = '1';
        }
        $su->username = $request->input('username');

        $su->password = bcrypt($request->input('password'));
        $su->fname = $request->input('fname');
        $su->lname = $request->input('lname');
        $su->city = $request->input('city');
        $su->status = "1";
        $su->save();

        return redirect('manage-users')
            ->with('message', 'New User Has been updated');;

    }
    public function add_record_view()
    {
        return view('client.add_record');
    }
    public function add_record(Request $request)
    {

        $record = new biltyrecord();
        if (session()->get('type') == "client_owner")
        {
            $record->o_id = Auth::user()->id;
        }
        else if (session()
            ->get('type') == "client_user")
        {
            $id = session()->get('id');
            $o_id = Susers::find($id);

            $id = $o_id->o_id;
            $record->o_id = $id;

        }

        $record->bilty_number = $request->input('bilty_number');
        $record->bilty_type = $request->input('bilty_type');
        $record->sender_company = $request->input('sender_company');
        $record->receiver_company = $request->input('receiver_company');
        $record->sender_city = $request->input('sender_city');
        $record->receiver_city = $request->input('receiver_city');
        $record->date_of_booking = $request->input('date_of_booking');

        $record->date_of_receiving = $request->input('date_of_receiving');
        $record->goods_company = $request->input('goods_company');
        $record->quantity = $request->input('quantity');
        $record->bilty_charges = $request->input('bilty_charges');
        $record->bundles = $request->input('bundles');
        $record->notes = $request->input('notes');
        $record->description = $request->input('description');
        $record->charge_to = $request->input('charge_to');
        $record->to_record = $request->input('to_record');
        $record->entry_by = session()
            ->get('name');
        $record->save();
        return redirect('/records-view')
            ->with('message', 'Your New bilty record has been added');
    }
    public function records_view()
    {
        $id = 1;
        if (session()->get('type') == "client_owner")
        {

            $id = Auth::user()->id;

            $records = DB::table('biltyrecords')->where('o_id', $id)->get();
        }
        else if (session()
            ->get('type') == "client_user")
        {
            $id = session()->get('id');

            $o_id = Susers::find($id);

            $id = $o_id->o_id;

            $records = DB::table('biltyrecords')->where('o_id', $id)->get();
        }

        return view('client.records_list', compact('records'));
    }

    public function specific_view_record($id)
    {
        $r = biltyrecord::find($id);

        return view('client.records_view', compact('r'));
    }

    public function eidt_record_view($id)
    {
        $r = biltyrecord::find($id);

        return view('client.edit_record', compact('r'));
    }

    public function edit_record(Request $request, $id)
    {

        $record = biltyrecord::find($id);

        if (session()->get('type') == "client_owner")
        {
            $record->o_id = Auth::user()->id;
        }
        else if (session()
            ->get('type') == "client_user")
        {
            $id = session()->get('id');
            $o_id = Susers::find($id);

            $id = $o_id->o_id;
            $record->o_id = $id;

        }

        $record->bilty_number = $request->input('bilty_number');
        $record->bilty_type = $request->input('bilty_type');
        $record->sender_company = $request->input('sender_company');
        $record->receiver_company = $request->input('receiver_company');
        $record->sender_city = $request->input('sender_city');
        $record->receiver_city = $request->input('receiver_city');
        $record->date_of_booking = $request->input('date_of_booking');
        $record->date_of_receiving = $request->input('date_of_receiving');
        $record->goods_company = $request->input('goods_company');
        $record->quantity = $request->input('quantity');
        $record->bilty_charges = $request->input('bilty_charges');
        $record->bundles = $request->input('bundles');
        $record->notes = $request->input('notes');
        $record->description = $request->input('description');
        $record->charge_to = $request->input('charge_to');
        $record->to_record = $request->input('to_record');
        $record->entry_by = session()
            ->get('name');
        $record->save();
        return redirect('/records-view')
            ->with('message', 'Your Bilty Record has been updated');;
    }
    public function delete_record($id)
    {
        $r = biltyrecord::find($id);
        $r->delete();

        return redirect('/records-view')
            ->with('message', 'Your Bilty Record has been deleted');;
    }
    public function edit_user_view($id)
    {
        $u = susers::find($id);

        return view('client.edit_user', compact('u'));
    }

    public function edit_user(Request $request, $id)
    {
        $su = susers::find($id);
        if ($request->input('edit'))
        {
            $su->edit_permission = '1';
        }
        else
        {
            $su->edit_permission = '0';
        }
        if ($request->input('delete'))
        {
            $su->delete_permission = '1';
        }
        else
        {
            $su->delete_permission = '0';
        }
        if ($request->input('password') != $request->input('cpassword'))
        {
            return "password not same";
        }
        $su->username = $request->input('username');
        if ($request->input('password') == $request->input('cpassword') && $request->input('password') != "null")
        {
            $su->password = bcrypt($request->input('password'));
        }

        $su->fname = $request->input('fname');
        $su->lname = $request->input('lname');
        $su->city = $request->input('city');
        $su->save();

        return redirect('manage-users')
            ->with('message', 'user successfully updated');

        return view('client.edit_user', compact('u'));
    }
    public function delete_user($id)
    {
        $r = susers::find($id);
        $r->delete();

        return redirect('/manage-users')
            ->with('message', 'Your User has been deleted');;
    }

    public function reports($type = null, $sql = null)
    {

        $id = 1;

        if (session()->get('type') == "client_owner")
        {

            $id = Auth::user()->id;

            $records = DB::table('biltyrecords')->where('o_id', $id)->get();
        }
        else if (session()
            ->get('type') == "client_user")
        {
            $id = session()->get('id');

            $o_id = Susers::find($id);

            $id = $o_id->o_id;

            $records = DB::table('biltyrecords')->where('o_id', $id)->get();
        }

        $sender_name = db::select("select distinct sender_company from biltyrecords where o_id ='$id' and sender_company is not null");

        $receiver_name = db::select("select distinct receiver_company from biltyrecords where o_id ='$id' and receiver_company is not null");

        $sender_city = db::select("select distinct sender_city from biltyrecords where o_id ='$id' and sender_city is not null");

        $receiver_city = db::select("select distinct receiver_city from biltyrecords where o_id ='$id' and receiver_city is not null");
        $goods_company = db::select("select distinct goods_company from biltyrecords where o_id ='$id' and goods_company is not null");

        if ($type == 'filter')
        {
            $records = db::select($sql);
        }

        return view('client.report', compact('records', 'sender_name', 'receiver_name', 'sender_city', 'receiver_city', 'goods_company'));
    }

    public function view_subscription()
    {
        $username = session('username');
        $ccid = session('id');
        $days = '30';
        $months = '90';
        $monthss = '180';
        $year = '365';
        $customer = user::find($ccid);
        $rs = db::select("select* from users, cashtransactions where users.id =cashtransactions.user_id and users.id= '$ccid'");
        
        if(count($rs)>0){
        $day = $rs[0]->days;
        }
        
        $check = cashtransaction::where('user_id', $ccid)->where('status', 'pending')
            ->first();
        if (!empty($check)) if ($check->status == "pending")
        {
            $check = 1;
        }
        else
        {
            $check = 0;
        }
        $mop = $customer->mode_of_payment;
        if ($customer->subscription != "NONE" && $customer->mode_of_payment != "cash" && $customer->subscription != "TRIAL" && $customer->subscription_status != 0)
        {
            $r = db::select("select* from bilty_transaction where username ='$username' ORDER BY id DESC LIMIT 1");
            if (count($r) > 0)
            {
                $a_id = $r[0]->{'agreement_id'};
            }
            $a_id="";
        }
        $t = trial_used::where('user_id', $ccid)->get();

        return view('client.price_plan', compact('check', 'mop', 't', 'customer', 'days', 'months', 'monthss', 'year','day'));
    }

    public function upload_cash_slip($subs, $month, Request $request)
    {
        $user_id = session('id');

        $result = DB::delete("delete from cashtransactions where user_id='$user_id '");

        $c = new cashtransaction();
        $b = new historycashtransaction();

        $c->subscription = $subs;
        $c->user_id = session('id');
        $days = $month * 30;

        if ($subs == "BASIC" && $days == '30')
        {

            $c->amount = 9;
            $c->days = $days;
        }

        if ($subs == "BASIC" && $days == '90')
        {

            $c->amount = 18;
            $c->days = $days;
        }

        if ($subs == "BASIC" && $days == '180')
        {

            $c->amount = 54;
            $c->days = $days;
        }

        if ($subs == "BASIC" && $days == '365')
        {

            $c->amount = 108;
            $c->days = $days;
        }
        else if ($subs == "ESSENTIAL" && $days == '30')
        {

            $c->amount = 13;
            $c->days = $days;
        }

        else if ($subs == "ESSENTIAL" && $days == '90')
        {

            $c->amount = 39;
            $c->days = $days;
        }

        else if ($subs == "ESSENTIAL" && $days == '180')
        {

            $c->amount = 78;
            $c->days = $days;
        }

        else if ($subs == "ESSENTIAL" && $days == '365')
        {

            $c->amount = 156;
            $c->days = $days;
        }

        else if ($subs == "PRO" && $days == '30')
        {

            $c->amount = 16;
            $c->days = $days;
        }

        else if ($subs == "PRO" && $days == '90')
        {

            $c->amount = 48;
            $c->days = $days;
        }
        else if ($subs == "PRO" && $days == '180')
        {

            $c->amount = 96;
            $c->days = $days;
        }
        else if ($subs == "PRO" && $days == '365')
        {

            $c->amount = 192;
            $c->days = $days;
        }

        $thumbnail = "";
        if ($request->hasFile('fileupload'))
        {
            $image = $request->file('fileupload');
            $uniqueFileName = uniqid() . $image->getClientOriginalName();

            $input['imagename'] = time() . '.' . strtolower($image->getClientOriginalExtension());

            $image->storeAs('public/images', $uniqueFileName);
            $thumbnail = $uniqueFileName;
        }
        $c->file = $thumbnail;

        $c->save();

        $pk = db::select("select id from cashtransactions where user_id ='$user_id' ORDER BY user_id DESC LIMIT 1");
        $a_id = $pk[0]->id;
        $b->cash_id = $a_id;
        $b->subscription = $subs;
        $b->user_id = session('id');
        $days = $month * 30;

        if ($subs == "BASIC" && $days == '30')
        {

            $b->amount = 9;
            $b->days = $days;
        }

        if ($subs == "BASIC" && $days == '90')
        {

            $b->amount = 18;
            $b->days = $days;
        }

        if ($subs == "BASIC" && $days == '180')
        {

            $b->amount = 54;
            $b->days = $days;
        }

        if ($subs == "BASIC" && $days == '365')
        {

            $b->amount = 108;
            $b->days = $days;
        }
        else if ($subs == "ESSENTIAL" && $days == '30')
        {

            $b->amount = 13;
            $b->days = $days;
        }

        else if ($subs == "ESSENTIAL" && $days == '90')
        {

            $b->amount = 39;
            $b->days = $days;
        }

        else if ($subs == "ESSENTIAL" && $days == '180')
        {

            $b->amount = 78;
            $b->days = $days;
        }

        else if ($subs == "ESSENTIAL" && $days == '365')
        {

            $b->amount = 156;
            $b->days = $days;
        }

        else if ($subs == "PRO" && $days == '30')
        {

            $b->amount = 16;
            $b->days = $days;
        }

        else if ($subs == "PRO" && $days == '90')
        {

            $b->amount = 48;
            $b->days = $days;
        }
        else if ($subs == "PRO" && $days == '180')
        {

            $b->amount = 96;
            $b->days = $days;
        }
        else if ($subs == "PRO" && $days == '365')
        {

            $b->amount = 192;
            $b->days = $days;
        }

        $thumbnail = "";
        if ($request->hasFile('fileupload'))
        {
            $image = $request->file('fileupload');
            $uniqueFileName = uniqid() . $image->getClientOriginalName();

            $input['imagename'] = time() . '.' . strtolower($image->getClientOriginalExtension());

            $image->storeAs('public/images', $uniqueFileName);
            $thumbnail = $uniqueFileName;
        }
        $b->file = $thumbnail;

        $b->save();

        return redirect('/view-subscription')
            ->with('message', 'Your Cash Payment has been submitted and under review, usually it take 2-3 business days to verify your payment');
    }

    public function transaction_history()
    {
        $id = session('id');
        $c = cashtransaction::where('user_id', $id)->get();
        return view('client.transaction_history', compact('c'));
    }

    public function start_trial()
    {
        $date = date('Y-m-d', strtotime(' + 7 days'));

        $id = session()->get('id');
        db::update("update users set subscription='TRIAL',s_created =CURRENT_TIMESTAMP(),subscription_status='1' where id ='$id'");
        session()->put('subscription', 'TRIAL');
        $t = new trial_used();
        $t->user_id = $id;
        $t->trial_end = $date;
        $t->save();
        return redirect('dashboard')
            ->with('message', 'Your Trial Has Been Started');
    }

    public function city()
    {
        //   return "a";
        //     $records = db::select("select* from biltyrecords");
        //     foreach($records as $city)
        //     {
        //         $a = "Lahore";
        //         $b = "Karachi";
        //         $sender_name = "Lahore office";
        //         $receiver_name = "Karachi Office";
        //   db::update("update biltyrecords set sender_city = '$a' , receiver_city = '$b' where sender_company = '$sender_name' and receiver_company = '$receiver_name'");
        

        // }
        //     $records1 = db::select("select* from biltyrecords  where sender_city = '$a' and receiver_city = '$b'");
        // $result1 =DB::update("update susers,users set susers.status='0 'where users.id = susers.o_id and users.subscription ='NONE' and users.subscription_status='0'");
        return $result1;

    }
}

