<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    //

    public function showRegister(){
        return view('auth.register');
    }

    public function showLogin(){
        return view('auth.login');
    }


    public static function register(Request $request){

        $validated = $request->validate([
           'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users',
             'password' => 'required|min:8|confirmed',
        ]);

        // hast the password
         $validated['password'] = Hash::make($validated['password']);
         User::create($validated);


         return redirect()->route('auth.login')->with('success','Successfully Regisred please Login your Account');
    }


    public static function login(Request $request){

        $validated = $request->validate([
           'username' => 'required',
           'password' => 'required'
        ]);



       // if success then redirect to home page
       if(Auth::attempt($validated)){
        $request->session()->regenerate();

        return redirect()->intended('/');
       }

       return back()->with('error','invalid username or password');
    }


    // for logout
   public static function logout(Request $request){
     Auth::logout();

     $request->session()->invalidate();
     $request->session()->regenerateToken();

     return view('/auth/login')->with('success','You have been Logout');
   }

}
