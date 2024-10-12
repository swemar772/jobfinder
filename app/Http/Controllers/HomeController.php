<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function login()
    {
        if(!empty(Auth::check())){
            return redirect()->back()->with('fail', 'Now you are loggined.');
        }
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'email.required' => 'Email is required.',
            'password.required' => 'Password is required'
        ]);

        if($validator->passes())
        {


            if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
            {
                if(Auth::user()->status == 1)
                {
                    if(Auth::user()->role_id == 1)
                    {
                        return redirect()->route('home')->with('success', 'Welcome to Find Job');
                    }
                    else
                    {
                        return redirect()->route('dashboard')->with('success', 'Welcome to Dashboard');
                    }
                }
                else
                {
                    Auth::logout();
                    return back()->with('fail','Account has been blocked!');
                }
            }
            else
            {
                return back()->with('error', 'Email (or) Password is incorrect!');
            }
        }
        else
        {
            return back()->withInput()->withErrors($validator);
        }
    }

    public function register()
    {
        if(!empty(Auth::check())){
            return redirect()->back()->with('fail', 'Now you are loggined.');
        }
        return view('register');
    }

    public function register_store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ],[
            'name.required' => 'Full Name is required.',
            'email.required' => 'Email is required.',
            'password.required' => 'Password is required'
        ]);

        if($validator->passes())
        {

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role_id = 1;
            $user->status = 1;
            $user->save();

            return redirect()->route('login')->with('success', 'Account Registered Successfully.');

        }
        else
        {
            return back()->withInput()->withErrors($validator);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}