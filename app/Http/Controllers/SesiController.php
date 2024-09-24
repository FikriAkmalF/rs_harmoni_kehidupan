<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index()
    {
        return view('rs_login');
    }

    function login_rs(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib di isi',
            'password.required' => 'Password wajib di isi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->role == 'perawat') {
                return redirect('rs/perawat');
            } elseif (Auth::user()->role == 'apoteker') {
                return redirect('rs/apoteker');
            } elseif (Auth::user()->role == 'dokter') {
                return redirect('rs/dokter');
            } elseif (Auth::user()->role == 'pasien') {
                return redirect('rs/pasien');
            }
        } else {
            return redirect('rs_login')->withErrors('Email dan Password salah!')->withInput();
        }
    }

    function rs_logout()
    {
        Auth::logout();
        return redirect('rs_login')->with('success', 'Berhasil logout!');
    }
}
