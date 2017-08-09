<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    //

    public function getSignup(){
    	return view('user.signup');
    }

    public function postSignup(Request $request){
    	// return view('user.signup');

    	$this->validate($request, [
    		'email' => 'email|required|unique:users',
    		'password' => 'required|min:4|confirmed'
    		]);

    	$user = new User([
    		'email' => $request->input('email'),
    		'password' => bcrypt($request->input('password')),
            'role_id' => intval($request->input('role_id')),
            'status_id' => intval($request->input('status_id'))

    		]);

    	$user->save();
        \Session::flash('success-signup', 'Your account has been created please Login');
    	return redirect()->route('product.index');
    }


    public function getSignin(){
        if(Auth::check()){
            return redirect()->route('user.profile');
        }else{
           return view('user.login'); 
        }
       
    }

    public function postSignin(Request $request){
        // return view('user.signup');

        $this->validate($request, [
            // 'email' => 'email|required',
            'password' => 'required|min:4'
            ]);

        if(\Session::has('cart'))
        {
            if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
            {
                return redirect()->route('checkout');
            }
            elseif (Auth::attempt(['username' => $request->input('email'), 'password' => $request->input('password')])) 
            {
                # code...
                return redirect()->route('checkout');
            }
            else
            {
                return back();
            }


        }
        else
        {


                if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
                {
                    // dd('hi');
                    return redirect()->route('user.profile');
                }
                elseif (Auth::attempt(['username' => $request->input('email'), 'password' => $request->input('password')])) 
                {
                    // dd('elseif');
                    # code...
                    return redirect()->route('user.profile');
                }
                else
                {
                    // dd('else');
                    return redirect()->route('user.profile');
                }
                // dd('none');

            
            
        }
        
        // return redirect()->intended('checkout');
    }

    public function getProfile(){
        if(Auth::check()){
            $orders = Auth::user()->orders;
            $orders->transform(function($order, $key) {
                $order->cart =unserialize($order->cart);
                return $order;
            });
            return view('user.profile', ['orders'=> $orders]);  
        }else{
            return redirect()->route('user.signin');
        }
        
    }

    public function getLogout(){
        Auth::logout();
        return redirect('/product')->with('message', 'Logged out successful');
    }

}

