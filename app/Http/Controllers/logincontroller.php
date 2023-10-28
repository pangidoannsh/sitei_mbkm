<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class logincontroller extends Controller
{
    public function login(){

        return view('login.index');

    }
    public function akun(){

        return view('login.akun');

    }
}
