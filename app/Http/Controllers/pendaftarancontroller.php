<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pendaftarancontroller extends Controller
{
    public function index(){
        return view('pendaftaran.index');
    }
}
