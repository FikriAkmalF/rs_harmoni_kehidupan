<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Pasien;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasienController extends Controller
{
    public function tambah(Request $request)
    {
        $request->validate([
            'no_bpjs' => 'required|unique:pasien',
            'name' => 'required',
            'email' => 'required|email',
            'keluhan' => 'required',
            'gender' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'gol_darah' => 'required',
            'tanggal_lahir' => 'required',
        ], [
            'no_bpjs.unique' => 'BPJS sudah terdaftar!',
            'email.required' => 'Email harus diisi!',
            'email.email' => 'Format email tidak valid!',
        ]);

        // Simpan data pasien bersama dengan user_id
        $pasien = new Pasien([
            'name' => $request->name,
            'no_bpjs' => $request->no_bpjs,
            'email' => $request->email,
            'keluhan' => $request->keluhan,
            'gender' => $request->gender,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'gol_darah' => $request->gol_darah,
            'tanggal_lahir' => $request->tanggal_lahir,
            'user_id' => Auth::id(), // Mengisi user_id dengan ID pengguna yang login
        ]);

        $pasien->save();

        return redirect()->back()->with('success', 'Tunggu beberapa saat dan silahkan cek jadwal!');
    }

    // Menampilkan data sesuai Auth / id yang sedang login dari tabel Pasien
    public function data_pasien()
    {
        $userId = Auth::id();

        if ($userId) {
            $data = Pasien::where('user_id', $userId)->paginate(4);
        } else {
            $data = Pasien::paginate(4);
        }

        return view('user.pasien', compact('data'));
    }


    // Menampilkan semua data dari tabel Pasien
    public function data()
    {
        $data_pasien = Pasien::paginate(5);
        return view('user.data_pasien', compact('data_pasien'));
    }


    public function cari_pasien(Request $request)
    {
        $cari_pasien = $request->input('cari_pasien');

        $query = Pasien::query();

        if ($cari_pasien) {
            $query->where('name', 'LIKE', "%$cari_pasien%");
        }

        $data = $query->paginate(4);

        if ($data->isEmpty()) {
            return redirect()->back()->with('error_nama', 'Nama Tidak Ditemukan');
        }

        return view('user.pasien', compact('data'));
    }

    public function cari_data_pasien(Request $request)
    {
        $cari_data_pasien = $request->input('cari_data_pasien');

        $query = Pasien::query();

        if ($cari_data_pasien) {
            $query->where('name', 'LIKE', "%$cari_data_pasien%");
        }

        $data_pasien = $query->paginate(4);

        if ($data_pasien->isEmpty()) {
            return redirect()->back()->with('error', 'Nama Tidak Ditemukan');
        }

        return view('user.data_pasien', compact('data_pasien'));
    }

    public function index()
    {
        // Mengambil data dari tabel users dengan id dari 1 hingga 8
        $users = User::whereBetween('id', [1, 8])->get();
        dd($users); // Tambahkan ini untuk debugging

        // Mengirim data ke view
        return view('user.dokter', compact('users'));
    }

    public function batalkan($id)
    {
        $pasien = Pasien::find($id);
    
        if ($pasien) {
            // Ubah status pasien menjadi 'dibatalkan'
            $pasien->status = 'Dibatalkan';
            $pasien->save();
    
            // Redirect dengan pesan sukses
            return redirect()->back()->with('success_batalkan', 'Pasien telah dibatalkan.');
        }
    
        return redirect()->back()->with('error', 'Pasien tidak ditemukan.');
    }
    
}
