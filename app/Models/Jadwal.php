<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal'; // Nama tabel di database
    protected $fillable = [
        'name',
        'no_antrian',
        'no_hp',
        'no_bpjs',
        'gender',
        'tanggal',
        'email',
        'keluhan',
        'gol_darah',
        'alamat',
        'dokter',
        'catatan',
        'tanggal_lahir',
        'user_id',
        'keterangan',
        'status_periksa',
    ];
}
