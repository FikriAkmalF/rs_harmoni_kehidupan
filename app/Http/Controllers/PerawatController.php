<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Pasien;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class PerawatController extends Controller
{
    public function data()
    {
        $data_jadwal = Jadwal::paginate(4);
        $data_pasien = Pasien::paginate(4);
        return view('perawat.pasien', compact('data_pasien', 'data_jadwal'));
    }

    public function jadwal()
    {
        $data_jadwal = Jadwal::paginate(4);
        return view('perawat.jadwal', compact('data_jadwal'));
    }

    public function cari_pasien_data(Request $request)
    {
        $cari_pasien_data = $request->input('cari_pasien_data');

        $query = Pasien::query();

        if ($cari_pasien_data) {
            $query->where('name', 'LIKE', "%$cari_pasien_data%");
        }

        $data_pasien = $query->paginate(4);

        if ($data_pasien->isEmpty()) {
            return redirect()->back()->with('error_nama', 'Nama Tidak Ditemukan');
        }

        return view('perawat.pasien', compact('data_pasien'));
    }

    public function cari_tanggal_jadwal(Request $request)
    {
        // Mengambil input tanggal dari request
        $cari_tanggal_jadwal = $request->input('cari_tanggal_jadwal');

        // Memulai query pencarian
        $query = Jadwal::query();

        // Jika ada input tanggal, lakukan pencarian berdasarkan tanggal yang tepat
        if ($cari_tanggal_jadwal) {
            $query->whereDate('tanggal', $cari_tanggal_jadwal);
        }

        // Mengambil data jadwal dengan paginasi
        $data_jadwal = $query->paginate(4);

        // Jika tidak ada data yang ditemukan, kembalikan pesan error
        if ($data_jadwal->isEmpty()) {
            return redirect()->back()->with('tanggal_error', 'Tidak ada tanggal pemeriksaan yang ditemukan!');
        }

        // Mengembalikan tampilan dengan data jadwal
        return view('perawat.jadwal', compact('data_jadwal'));
    }

    public function hapus($id)
    {
        $pasien = Pasien::find($id);

        if ($pasien) {

            $pasien->delete();

            // Redirect dengan pesan sukses
            return redirect()->back()->with('success_hapus', 'Pasien telah dihapus.');
        }

        // Jika pasien tidak ditemukan
        return redirect()->back()->with('error', 'Pasien tidak ditemukan.');
    }


    public function cari_pasien_status(Request $request)
    {
        $cari_pasien_status = $request->input('cari_pasien_status');

        $query = Pasien::query();

        if ($cari_pasien_status) {
            $query->where('status', 'LIKE', "%$cari_pasien_status%");
        }

        $data_pasien = $query->paginate(4);

        if ($data_pasien->isEmpty()) {
            return redirect()->back()->with('error_batal', 'Tidak ada yang membatalkan!');
        }

        return view('perawat.pasien', compact('data_pasien'));
    }


}
