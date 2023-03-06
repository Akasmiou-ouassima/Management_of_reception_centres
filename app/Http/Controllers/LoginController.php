<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class LoginController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }


    public function login(Request $request){

      

            
       $request->validate([
            'email'=>'required|max:100',
            'password'=>'required|min:6|max:50'
            ]);
            
        if (Auth::attempt(['email'=> $request->email,'password'=> $request->password],false)){
            return redirect()->route('users.index');}

        if (Auth::guard('admin')->attempt(['email'=> $request->email,'password'=> $request->password],false)){
            return redirect()->route('admins.index');}


        return redirect()->back()->withErrors(['Verifier mot de passe!']);
    }

 
    public function logout(Request $request){

       
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

    
            return redirect("/");
    }
}
