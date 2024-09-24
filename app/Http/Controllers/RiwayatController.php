<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Obat;
use App\Models\Riwayat;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function tambah(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'user_id' => 'required',
            'no_bpjs' => 'required|unique:riwayat', // validasi unique sudah ada
            'no_hp' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'nama_obat' => 'required',
            'harga' => 'required',
            'jumlah' => 'required|integer|min:1', // Tambahkan validasi untuk memastikan jumlah minimal 1
            'tanggal_lahir' => 'required',
            'gol_darah' => 'required',
            'keluhan' => 'required',
            'alamat' => 'required',
            'tanggal_pemeriksaan' => 'required',
            'dokter' => 'required',
            'catatan_dokter' => 'required',
            'keterangan' => 'required',
        ], [
            'no_bpjs.unique' => 'BPJS sudah terdaftar!', // Pesan error jika BPJS sudah ada
            'email.required' => 'Email harus diisi!',
            'email.email' => 'Format email tidak valid!',
        ]);

        // Cek apakah obat ada di tabel obat dan ambil data stok
        $obat = Obat::where('nama_obat', $request->nama_obat)->first();

        if ($obat) {
            // Cek apakah stok mencukupi
            if ($obat->jumlah >= $request->jumlah) {
                // Simpan data riwayat
                $riwayat = new Riwayat([
                    'name' => $request->name,
                    'user_id' => $request->user_id,
                    'no_bpjs' => $request->no_bpjs,
                    'no_hp' => $request->no_hp,
                    'gender' => $request->gender,
                    'email' => $request->email,
                    'nama_obat' => $request->nama_obat,
                    'harga' => $request->harga,
                    'jumlah' => $request->jumlah,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'gol_darah' => $request->gol_darah,
                    'keluhan' => $request->keluhan,
                    'alamat' => $request->alamat,
                    'tanggal_pemeriksaan' => $request->tanggal_pemeriksaan,
                    'dokter' => $request->dokter,
                    'catatan_dokter' => $request->catatan_dokter,
                    'keterangan' => $request->keterangan,
                ]);

                $riwayat->save();

                // Kurangi stok obat
                $obat->jumlah -= $request->jumlah;
                $obat->save();

                return redirect('dokter/jadwal')->with('success', 'Berhasil menyimpan data pemeriksaan pasien!');
            } else {
                return redirect('dokter/jadwal')->with('error_obat', 'Stok obat tidak mencukupi!');
            }
        }
    }
}
