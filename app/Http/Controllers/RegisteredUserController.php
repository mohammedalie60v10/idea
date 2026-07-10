<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required','string','min:3','max:244'],
            'email'=>['required','string','email',Rule::unique('users','email')],
            'password'=>['required','string','min:9','max:244'],
        ]);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
        ]);

        Auth::login($user);
        return redirect('/')->with('success','Registration complate');



    }
}
