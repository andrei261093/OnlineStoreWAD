<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
   public function getSignup(){
       return view('user.signup');
   }

    public function postSignup(Request $request){
        $this->validate($request, [
            'email' => 'email|required|unique:users'  ,
            'password' => 'required|min:4'
        ]);

        $user = new User([
            'firstName'=> $request->input('firstName'),
            'lastName'=> $request->input('lastName'),
            'email'=> $request->input('email'),
            'password'=> bcrypt($request->input('password'))

        ]);

        $user->save();

        return redirect()->route('product.index');
    }

    public function getSignin(){
        return view('user.signin');
    }

    public function postSignin(Request $request){
        $this->validate($request, [
            'email' => 'email|required'  ,
            'password' => 'required|min:4'
        ]);

        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
           //Session::put(Session::get('cart'), Auth::user);
            return redirect()->route('user.profile');
        }
        return redirect()->back();
    }

    public function getProfile(){
        return view('user.profile');
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('product.index');
    }
}
