<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Support\Facades\Auth;

class PdfController extends Controller
{
    public function cetak()
    {
        $userId = Auth::id();

        if ($userId) {
            $data_pdf = Riwayat::where('user_id', $userId)->paginate(4);
        } else {
            $data_pdf = Riwayat::paginate(4);
        }

        return view('pdf.pdf', compact('data_pdf'));
    }
}
