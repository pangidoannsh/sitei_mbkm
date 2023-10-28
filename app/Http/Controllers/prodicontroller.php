<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class prodicontroller extends Controller
{
    public function index(){
        return view('prodi.index');
    }
}
