<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;

Use App\Order;
use Auth;

use App\Models\Roles;

use App\User;


use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function dashboard(){
    	return view('admin.admin');
    }
    

    // public function addAdmin(Request $request){
    // 	if($request->isMethod('Post')){
    		
    // 		$this->validate($request, [
    // 		'email' => 'email|required|unique:users',
    // 		'password' => 'required|min:4|confirmed'
    // 		]);

    // 		$user = new User([
    // 		'email' => $request->input('email'),
    // 		'password' => bcrypt($request->input('password')),
    //         'role_id' => intval($request->input('role_id')),
    //         'status_id' => intval($request->input('status_id'))
    // 		]);

    // 		$user->save();

    //         return redirect()->route('dashboard');

    // 	}else{
    // 		return view('admin.signup');
    // 	}
    // }


    public function login(Request $request)
    {
        $method = $request->isMethod('post');
            switch ($method) {
                case true:
                        $this->validate($request, [
                            'email' => 'required|min:4',
                            'password' => 'required|min:4'
                        ]);
                        $authenticate_user = Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]);
                        if ($authenticate_user) {
                            return redirect()->route('dashboard')->with('success','Welcome Admin');
                        }else{
                            return redirect()->route('addAdmin')->with('delete_message', 'Wrong Email or Password');
                        }
                break;
                case false:
                    if (Auth::check()) {
                         return redirect()->route('');
                    }
                    return view('admin.adminlogin');
                break;
                default:
                    if (Auth::check()) {
                         return redirect()->route('dashboard');
                    }
                    return view('admin.adminlogin');
                break;
            }
    }

    public function addAdmin(Request $request)
    {
         $method = $request->isMethod('post');
            switch ($method) {
                case true:
                        $this->validate($request, [
                            'email' => 'required|unique:users',
                            'password' => 'required|min:4',
                            'confirm_password' => 'required|min:4'
                        ]);
                        $password = $request->input('password');
                        $confirm_password = $request->input('confirm_password');
                        if ($password === $confirm_password) {
                            $role = Roles::where('name', 'Admin')->first();
                            $user = new User([
                              'email' => $request->input('email'),
                              'password' => bcrypt($password),
                              ]);
                            $user->role()->associate($role);
                            $user->save();
                            return redirect()->route('dashboard')->with('success','Admin created successfully!');
                        }else{
                            return redirect('addAdmin')->with('delete_message', 'Password does not match!');
                        }
                break;
                case false:
                    return view('admin.signup');
                break;
                default:
                    return view('admin.signup');
                break;
            }
    }
}

//     public function dashboard(){
//         if(Auth::check()){
//             return view('admin.admin');
//         }else{
//             return redirect()->route('adminLogin');
//         }
//     }
// }
