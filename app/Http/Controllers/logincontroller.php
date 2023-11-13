<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\dosen;
use App\Models\role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class logincontroller extends Controller
{
    public function index(){

        // if (Auth::check()) {
        //     return redirect()->route('/');
        // }

        return view('login.index');
    }

    public function akun(){
        return view('login.akun');
    }


    // public function authenticate(Request $request)
    // {
    //     if (Auth::guard('dosen')->attempt(['nip' => $request->username, 'password' => $request->password])) {
    //         return redirect('/approve');
    //     } elseif (Auth::guard('mahasiswa')->attempt(['nim' => $request->username, 'password' => $request->password])) {
    //         return redirect('/pendaftaran');
    //     }


    //     return redirect('/')->with('loginError', 'Login Gagal!');
    // }

    // public function logout()
    // {
    //     if (Auth::guard('dosen')->check()) {
    //         Auth::guard('dosen')->logout();
    //     } elseif (Auth::guard('mahasiswa')->check()) {
    //         Auth::guard('mahasiswa')->logout();
    //     } elseif (Auth::guard('web')->check()) {
    //         Auth::guard('web')->logout();
    //     }
    //     return redirect('/');
    // }

    // public function authenticate(Request $request)
    // {

    //     $validator = Validator::make($request->all(), [
    //         'nim' => 'required|nim',
    //         'password' => 'required'
    //     ]);

    //     if (Auth::attempt(['nim' => $request->nim, 'password' => $request->password])) {
    //         $request->session()->regenerate();

    //         return redirect()->route('prodi.index');
    //     }

    //         return redirect()->back()->with('error', 'Email atau password salah');


    // }

    // public function authenticate(Request $request)
    // {
    //     if (Auth::user()->role('prodi')->attempt(['nim' => $request->nim, 'password' => $request->password])) {
    //         return redirect('/aprove');
    //     } elseif (Auth::user()->role('staff')->attempt(['nim' => $request->nim, 'password' => $request->password])) {
    //         return redirect('/staff/index');
    //     } elseif (Auth::user()->role('mahasiswa')->attempt(['nim' => $request->nim, 'password' => $request->password])) {
    //         return redirect('/pendaftaran');
    //     }


    //     return redirect('/')->with('loginError', 'Login Gagal!');
    // }

    // public function logout(Request $request)
    // {
    //     Auth::logout();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();

    //     return redirect()->route('pendaftaran.index');
    // }


}
