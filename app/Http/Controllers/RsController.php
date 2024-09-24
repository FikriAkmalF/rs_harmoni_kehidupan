<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RsController extends Controller
{
    function index()
    {
        echo "Hallo, selamat datang";
        echo "<h1>". Auth::user()->name ."</h1>";
        echo "<a href='/rs_logout'>Logout</a>";
    }
    function perawat()
    {
        echo "Hallo, selamat datang di halaman perawat";
        return redirect()->route('perawat.perawat');
    }
    function apoteker()
    {
        echo "Hallo, selamat datang di halaman apoteker";
        return redirect()->route('apoteker.apoteker');
    }
    function dokter()
    {
        echo "Hallo, selamat datang di halaman dokter";
        return redirect()->route('dokter.dokter');
    }
    function pasien()
    {
        echo "Hallo, selamat datang di halaman pasien";
        return redirect()->route('user.user_dashboard');
    }
}
