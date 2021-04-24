<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAuth extends Controller
{
    function userLogin(Request $req){
        // dd("");
        $data =  $req->input();
        $req = session()->put('user',$data['user']);
        return redirect('admin');
    }
}
