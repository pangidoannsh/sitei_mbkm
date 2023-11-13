<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class staffcontroller extends Controller
{
    public function index(){
        return view('staff.index');
    }
    public function print(){
        return view('staff.print');
    }

    public function downloadpdf(){
        $pdf = PDF::loadview('staff.print');
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('konversi.pdf');
    }
}
