<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sertifikatcontroller extends Controller
{
    public function index(){
        return view('sertifikat.index');
    }
    public function create(){
        return view('sertifikat.create');
    }
}
