<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;

    protected $table = 'riwayat'; // Nama tabel di database
    protected $fillable = [
        'name',
        'user_id',
        'no_bpjs',
        'no_hp',
        'gender',
        'email',
        'nama_obat',
        'harga',
        'jumlah',
        'tanggal_lahir',
        'gol_darah',
        'keluhan',
        'alamat',
        'tanggal_pemeriksaan',
        'dokter',
        'catatan_dokter',
        'status',
        'keterangan',
    ];
}
