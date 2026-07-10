<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
   public function create()
   {
       return view('auth.login');
   }
   public function store(Request $request)
   {
    $attributes = $request->validate([
    'email'=>['required','email','string','max:222'],
    'password'=>['required','string','min:5','max:44']
]);
    if(!Auth::attempt($attributes))
    {
        return back()->withErrors(['password'=>'We were unable to authenticate using the provided credentials'])->withInput();
    }
$request->session()->regenerate();
    return redirect()->intended('/')->with('success','You are now logged in.');
   }
   public function destroy()
   {
        Auth::logout();
        return redirect('/');
   }
}
