<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;

use App\User;
use App\Susers;
use App\biltyrecord;
use DB;
use Hash;
class pageController extends Controller
{
    public function login_view()
    {
        return view('login');
    }

    public function register(Request $request)
    {
        if(count(user::where('username',$request->input('username'))->get())>0)
        
        {
        return redirect('/register')->with('error','Username is already Exists');
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

        return redirect('/login')->with('success', 'You are Successfully Registered');
    }
    public function login(Request $request)
    {
        session('type','asd');
        $username = $request->input('username');
        $password = $request->input('password');
        if(count(user::where('username',$username)->get())>0)
        {

        
       
        $userdata = array(
            'username'     => $username,
            'password'  => $password
        );

        if(Auth::attempt($userdata))
        {
            
            session()->put('username',$username);
            session()->put('type','client_owner');
            session()->put('edit_permission','1');
            session()->put('delete_permission','1');
            
            $u =  user::where('username',$username)->first();
            session()->put('subscription',$u->subscription);
            session()->put('id',$u->id);
            session()->put('name',$u->fname.' '.$u->lname);
           
           return redirect('/dashboard');
        }
        else
        return redirect('/login')->with('error','Username or Password is incorrect');
    }
    else if(count(Susers::where('username',$username)->get())>0)
    {
       $u =  Susers::where('username',$username)->first();
      
       if(Hash::check($password,$u->password))
       {
        session()->put('username',$username);
        session()->put('type','client_user');
        session()->put('id',$u->id);
        session()->put('name',$u->fname.' '.$u->lname);
        session()->put('edit_permission',$u->edit_permission);
        session()->put('delete_permission',$u->delete_permission);

       
        return redirect('/dashboard');
       }
       else
       return redirect('/login')->with('error','Username or Password is incorrect');
    }
    else
    {
        return redirect('/login')->with('error','Username or Password is incorrect');
    }
    }
}
