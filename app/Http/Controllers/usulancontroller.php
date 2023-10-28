<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class usulancontroller extends Controller
{
    public function index(){
        return view ('usulan.index');
       }
    public function create(){
        return view ('usulan.create');
       }
}
