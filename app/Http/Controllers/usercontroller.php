<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class usercontroller extends Controller
{
    public function index(){
        $user=user::all();

        return view('user.index',compact('user'));
    }

    public function create(){
        $role=role::all();
        return view('user.create', compact('role'));
    }

    public function store(Request $request)
    {

        $user = user::create([
            'name' => $request->name,
            'email' => $request->email,
            'user' => $request->user,
            'role_id' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.index');
    }

    public function destroy($id){
        $user = user::find($id);

        $user->delete();

        return redirect()->back()->with('success', 'Product DELETED');
    }

}
