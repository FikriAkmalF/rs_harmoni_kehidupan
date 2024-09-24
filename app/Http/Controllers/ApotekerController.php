<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Order;
use App\Models\Pasien;
use App\Models\Riwayat;
use Illuminate\Http\Request;

class ApotekerController extends Controller
{
    public function data_all()
    {
        $obat = Obat::paginate(8);
        $jumlahPasien = Pasien::count(); // Menghitung jumlah Pasien
        $pasien = Pasien::selectRaw('COUNT(id) as count, MONTH(created_at) as month')
            ->groupBy('month')
            ->pluck('count', 'month');

        return view('apoteker.data', compact('obat', 'jumlahPasien', 'pasien'));
    }

    public function data()
    {
        $pasien_data = Pasien::paginate(8);

        return view('apoteker.pasien', compact('pasien_data'));
    }

    public function data_riwayat()
    {
        $data_riwayat = Riwayat::paginate(8);
        $data_order = Order::paginate(8);

        return view('apoteker.pembayaran', compact('data_riwayat', 'data_order'));
    }
}
