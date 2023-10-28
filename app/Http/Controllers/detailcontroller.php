<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class detailcontroller extends Controller
{
    public function index(){
        return view('revisi.index');
    }
    public function detail(){
        return view('revisi.detail');
    }
}
