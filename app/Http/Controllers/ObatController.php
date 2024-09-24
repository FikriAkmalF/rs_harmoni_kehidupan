<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Obat;
use App\Models\Pasien;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function data()
    {
        $data_obat = Obat::paginate(5);
        $jumlahPasien = Pasien::count(); // Menghitung jumlah Pasien
        $jumlahJadwal = Jadwal::count(); // Menghitung jumlah Jadwal
        $pasien = Pasien::selectRaw('COUNT(id) as count, MONTH(created_at) as month')
            ->groupBy('month')
            ->pluck('count', 'month');

        $jadwal = Jadwal::selectRaw('COUNT(id) as count, MONTH(created_at) as month')
            ->groupBy('month')
            ->pluck('count', 'month');

        return view('perawat.data', compact('data_obat', 'jumlahPasien', 'jumlahJadwal', 'pasien', 'jadwal'));
    }


    public function index()
    {
        // Contoh data obat
        $data_obat = [
            ['nama_obat' => 'Ponstan', 'dosis' => '500 mg', 'harga' => 40000, 'stok' => 10],
            ['nama_obat' => 'Paracetamol', 'dosis' => '500 mg', 'harga' => 5000, 'stok' => 20],
            ['nama_obat' => 'Isosorbide Dinitrate', 'dosis' => '5 mg', 'harga' => 15000, 'stok' => 15],
            ['nama_obat' => 'Insto', 'dosis' => '15 ml', 'harga' => 25000, 'stok' => 8],
        ];

        // Contoh data grafik pasien
        $pasienLabels = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni'];
        $pasienData = [30, 50, 40, 70, 60, 80]; // Jumlah pasien tiap bulan

        // Contoh data grafik jadwal
        $jadwalLabels = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        $jadwalData = [5, 8, 7, 9, 6]; // Jumlah jadwal harian

        // Mengirim data ke view
        return view('obat.index', compact('data_obat', 'pasienLabels', 'pasienData', 'jadwalLabels', 'jadwalData'));
    }

    public function view()
    {
        $obat = Obat::paginate(5);
        $jumlahPasien = Pasien::count(); // Menghitung jumlah Pasien
        $jumlahJadwal = Jadwal::count(); // Menghitung jumlah Jadwal

        return view('dokter.data', compact('obat', 'jumlahPasien', 'jumlahJadwal'));
    }

    public function views()
    {
        // Contoh data obat
        $obat = [
            ['nama_obat' => 'Ponstan', 'dosis' => '500 mg', 'harga' => 40000, 'stok' => 10],
            ['nama_obat' => 'Paracetamol', 'dosis' => '500 mg', 'harga' => 5000, 'stok' => 20],
            ['nama_obat' => 'Isosorbide Dinitrate', 'dosis' => '5 mg', 'harga' => 15000, 'stok' => 15],
            ['nama_obat' => 'Insto', 'dosis' => '15 ml', 'harga' => 25000, 'stok' => 8],
        ];

        // Contoh data grafik pasien
        $pasienLabels = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni'];
        $pasienData = [30, 50, 40, 70, 60, 80]; // Jumlah pasien tiap bulan

        // Contoh data grafik jadwal
        $jadwalLabels = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        $jadwalData = [5, 8, 7, 9, 6]; // Jumlah jadwal harian

        // Mengirim data ke view
        return view('obat.views', compact('obat', 'pasienLabels', 'pasienData', 'jadwalLabels', 'jadwalData'));
    }
}
