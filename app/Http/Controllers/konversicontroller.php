<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class konversicontroller extends Controller
{
    public function index(){
        return view('konversi.index');
    }
    public function create(){
        return view('konversi.create');
    }
}
