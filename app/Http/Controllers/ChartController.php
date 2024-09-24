<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Pasien;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index()
    {
        // Hitung jumlah pasien dan jadwal per bulan
        $pasien = Pasien::selectRaw('COUNT(id) as count, MONTH(created_at) as month')
                            ->groupBy('month')
                            ->pluck('count', 'month');
                            
        $jadwal = Jadwal::selectRaw('COUNT(id) as count, MONTH(created_at) as month')
                            ->groupBy('month')
                            ->pluck('count', 'month');

        // Kirim data ke Blade
        return view('perawat.data', compact('pasien', 'jadwal'));
    }
}
