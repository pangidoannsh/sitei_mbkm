<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class nilaimbkmcontroller extends Controller
{
    public function index(){
        return view('nilaimbkm.index');
    }
    public function create(){
        return view('nilaimbkm.create');
    }
}
