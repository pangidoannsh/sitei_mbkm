<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class logincontroller extends Controller
{
    public function index()
    {

        // if (Auth::check()) {
        //     return redirect()->route('/');
        // }

        return view('login.index');
    }


    public function postlogin(Request $request)
    {
        // dd($request->all());
        if (Auth::guard('dosen')->attempt(['nip' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route("prodi");
        } elseif (Auth::guard('web')->attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('staff');
        } elseif (Auth::guard('mahasiswa')->attempt(['nim' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('mbkm');
        }


        return redirect('/')->with('loginError', 'Login Gagal!');
    }

    public function logout()
    {
        if (Auth::guard('dosen')->check()) {
            Auth::guard('dosen')->logout();
        } elseif (Auth::guard('mahasiswa')->check()) {
            Auth::guard('mahasiswa')->logout();
        } elseif (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }
        return redirect('/');
    }
}
