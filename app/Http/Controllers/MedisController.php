<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedisController extends Controller
{
        // Menampilkan semua data dari tabel Riwayat
        // public function data()
        // {
        //     $data_medis = Riwayat::paginate(5);
        //     return view('user.riwayat_medis', compact('data_medis'));
        // }

        public function data()
        {
            $userId = Auth::id();
    
            if ($userId) {
                $data_medis = Riwayat::where('user_id', $userId)->paginate(4);
            } else {
                $data_medis = Riwayat::paginate(4);
            }
    
            return view('user.riwayat_medis', compact('data_medis'));
        }

        public function medis()
        {
            $rekam_medis = Riwayat::paginate(4);
            return view('perawat.riwayat_medis', compact('rekam_medis'));
        }

        // public function riwayat_medis()
        // {
        //     $riwayat_medis = Riwayat::paginate(4);
        //     return view('dokter.riwayat_medis', compact('riwayat_medis'));
        // }

        public function riwayat()
        {
            // Mengambil nama dokter yang sedang login dari tabel users
            $dokter = Auth::user()->name;
        
            // Mengecek apakah ada dokter yang sedang login
            if ($dokter) {
                // Mengambil data jadwal yang sesuai dengan nama dokter yang login
                $riwayat_medis = Riwayat::where('dokter', $dokter)->paginate(4);
            } else {
                // Jika tidak ada dokter yang login, tampilkan semua jadwal (opsional)
                $riwayat_medis = Riwayat::paginate(4);
            }
        
            // Mengirimkan data riwayat_medis dan riwayat ke view
            return view('dokter.riwayat_medis', compact('riwayat_medis'));
        }
}
