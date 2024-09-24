<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function pembayaran()
    {
        $userId = Auth::id();
    
        if ($userId) {
            // Ambil data riwayat berdasarkan user
            $data_pembayaran = Riwayat::where('user_id', $userId)->paginate(4);
            // Ambil status order berdasarkan user
            // $data_status = Order::where('status')->paginate(4);
            // $data_status = Order::paginate(4);
            $data_status = Order::select('status')->paginate(4);

        } else {
            // Jika user belum login, tampilkan semua
            $data_pembayaran = Riwayat::paginate(4);
            // $data_status = Order::paginate(4);
            $data_status = Order::select('status')->paginate(4);
        }
    
        // Pass kedua variabel ke view
        return view('user.pembayaran', compact('data_pembayaran', 'data_status'));
    }
    
}
