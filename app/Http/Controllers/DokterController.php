<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DokterController extends Controller
{
    public function cari_dokter(Request $request)
    {
        $cari_dokter = $request->input('cari_dokter');

        $query = Jadwal::query();

        // Jika ada input pencarian dokter
        if ($cari_dokter) {
            // Cari berdasarkan nama dokter
            $query->where('dokter', 'LIKE', "%$cari_dokter%");
        }

        // Paginate results
        $jadwal_pasien = $query->paginate(4);

        // Jika hasil pencarian kosong, kembalikan dengan pesan error
        if ($jadwal_pasien->isEmpty()) {
            return redirect()->back()->with('error_dokter', 'Dokter Tidak Ditemukan');
        }

        return view('user.jadwal_pasien', compact('jadwal_pasien'));
    }

    // Menampilkan semua data dari tabel Pasien
    public function data()
    {
        $data = Pasien::paginate(5);
        return view('dokter.pasien', compact('data'));
    }

    public function cari_nama_data_pasien(Request $request)
    {
        $cari_nama_data_pasien = $request->input('cari_nama_data_pasien');

        $query = Pasien::query();

        if ($cari_nama_data_pasien) {
            $query->where('name', 'LIKE', "%$cari_nama_data_pasien%");
        }

        $data = $query->paginate(4);

        if ($data->isEmpty()) {
            return redirect()->back()->with('error', 'Nama Tidak Ditemukan');
        }

        return view('dokter.pasien', compact('data'));
    }

    // Menampilkan data Pasien sesuai dengan nama Dokter
    public function jadwal_praktek()
    {
        // Mengambil nama dokter yang sedang login dari tabel users
        $dokter = Auth::user()->name;
    
        // Mengecek apakah ada dokter yang sedang login
        if ($dokter) {
            // Mengambil data jadwal yang sesuai dengan nama dokter yang login
            $jadwal_praktek = Jadwal::where('dokter', $dokter)->paginate(4);
        } else {
            // Jika tidak ada dokter yang login, tampilkan semua jadwal (opsional)
            $jadwal_praktek = Jadwal::paginate(4);
        }
    
        // Mengambil data riwayat (sesuaikan query sesuai kebutuhan)
        $riwayat = Riwayat::select('keterangan')->get(); // Ganti dengan query yang sesuai jika perlu
    
        // Mengirimkan data jadwal_praktek dan riwayat ke view
        return view('dokter.jadwal', compact('jadwal_praktek', 'riwayat'));
    }
    

    public function pemeriksaan($id)
    {
        $jadwal = Jadwal::find($id);
        $obat = Obat::all();
        return view('dokter.pemeriksaan', compact(['jadwal', 'obat']));
    }
}
