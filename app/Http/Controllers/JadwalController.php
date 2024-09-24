<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function cari_jadwal(Request $request)
    {
        $cari_jadwal = $request->input('cari_jadwal');

        $query = Jadwal::query();

        if ($cari_jadwal) {
            $query->where('name', 'LIKE', "%$cari_jadwal%");
        }

        $data = $query->paginate(4);

        if ($data->isEmpty()) {
            return redirect()->back()->with('error', 'Nama Tidak Ditemukan');
        }

        return view('user.jadwal', compact('data'));
    }

    public function edit($id)
    {
        $pasien = Pasien::find($id);
        return view('perawat.edit', compact(['pasien']));
    }

    public function store(Request $request)
    {
        // Validasi form
        $request->validate([
            'name' => 'required',
            'no_hp' => 'required',
            'no_bpjs' => 'required',
            'gender' => 'required',
            'tanggal' => 'required|date|date_format:Y-m-d',
            'email' => 'required|email',
            'keluhan' => 'required',
            'gol_darah' => 'required',
            'alamat' => 'required',
            'dokter' => 'required',
            'catatan' => 'required',
            'tanggal_lahir' => 'required',
            'keterangan' => 'required',
        ]);

        // Membuat nomor antrian berdasarkan dokter yang dipilih
        $kodeAntrian = '';
        switch ($request->dokter) {
            case 'Dr. Budi Santoso':
                $kodeAntrian = 'U';
                break;
            case 'Dr. Andi Wirawan':
                $kodeAntrian = 'G';
                break;
            case 'Dr. Dwi Haryanto':
                $kodeAntrian = 'A';
                break;
            case 'Dr. Irwan Raharja':
                $kodeAntrian = 'J';
                break;
            case 'Dr. Bambang Hermawan':
                $kodeAntrian = 'M';
                break;
        }

        // Hitung nomor antrian terakhir untuk dokter yang sama pada tanggal yang sama
        $count = Jadwal::where('dokter', $request->dokter)
            ->where('tanggal', $request->tanggal)
            ->count();

        $nomorAntrian = $kodeAntrian . ($count + 1);

        // Simpan data ke dalam tabel jadwal
        Jadwal::create([
            'name' => $request->name,
            'no_antrian' => $nomorAntrian,
            'no_hp' => $request->no_hp,
            'no_bpjs' => $request->no_bpjs,
            'gender' => $request->gender,
            'tanggal' => $request->tanggal,
            'email' => $request->email,
            'keluhan' => $request->keluhan,
            'gol_darah' => $request->gol_darah,
            'alamat' => $request->alamat,
            'dokter' => $request->dokter,
            'catatan' => $request->catatan,
            'tanggal_lahir' => $request->tanggal_lahir,
            'user_id' => $request->user_id,
            'keterangan' => $request->keterangan,
        ]);

        return redirect('/perawat/pasien')->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function data()
    {
        $jadwal_pasien = Jadwal::paginate(5);
        return view('user.jadwal_pasien', compact('jadwal_pasien'));
    }

    public function cari_nama_pasien(Request $request)
    {
        $cari_nama_pasien = $request->input('cari_nama_pasien');

        $query = Jadwal::query();

        if ($cari_nama_pasien) {
            $query->where('name', 'LIKE', "%$cari_nama_pasien%");
        }

        $jadwal_pasien = $query->paginate(4);

        if ($jadwal_pasien->isEmpty()) {
            return redirect()->back()->with('error', 'Nama Tidak Ditemukan');
        }

        return view('user.jadwal_pasien', compact('jadwal_pasien'));
    }

    public function data_jadwal()
    {
        $userId = Auth::id();

        if ($userId) {
            $data = Jadwal::where('user_id', $userId)->paginate(4);
        } else {
            $data = Jadwal::paginate(4);
        }

        return view('user.jadwal', compact('data'));
    }

    public function hapus($id)
    {
        $jadwal = Jadwal::find($id);

        if ($jadwal) {

            $jadwal->delete();

            // Redirect dengan pesan sukses
            return redirect()->back()->with('success_hapus', 'jadwal telah dihapus.');
        }

        // Jika jadwal tidak ditemukan
        return redirect()->back()->with('error', 'jadwal tidak ditemukan.');
    }
    
}
