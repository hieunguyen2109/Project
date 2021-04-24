<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function dasboard()
    {
        return view('backend.dasboard');
    }

    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function reg(Request $request){
        // dd($request->all());
        User::create([
            'email'=>$request->email,
            'name'=>$request->name,
            'password'=>bcrypt($request->password)
        ]);
        return redirect('login');
    }
}
