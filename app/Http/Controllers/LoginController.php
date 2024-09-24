<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Rs;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;


class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login_proses(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $email = $request->email;
        $password = $request->password;
    
        // Mengambil data dari tabel users_rs
        $user = DB::table('users')->where('email', $email)->first();
    
        if ($user && bcrypt($password) === $user->password) {
            // Set session atau proses lainnya
            session(['user_id' => $user->id]); // Menyimpan ID pengguna di session
    
            return redirect()->route('user.user_dashboard');
        } else {
            return redirect()->route('rs_login')->with('failed', 'Email atau Password salah');
        }
    }
    public function user_logout()
    {
        Auth::logout();
        return redirect()->route('rs_login')->with('success', 'Berhasil logout!');
    }
}
