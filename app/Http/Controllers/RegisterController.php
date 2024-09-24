<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function register_proses(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'no_hp' => 'required',
            'password' => 'required|min:6',
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['no_hp'] = $request->no_hp;
        $data['password'] = Hash::make($request->password);
        $data['role'] = 'pasien';
        $data['spesialis'] = '';

        User::create($data);

        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // if(Auth::attempt($login)){
        //     return redirect()->route('rs_login');
        // } else {
            return redirect()->back()->with('success','Register berhasil silahkan ke halaman login!');
        // }
    }
}
