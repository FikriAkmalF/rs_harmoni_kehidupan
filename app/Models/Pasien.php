<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasien'; // Nama tabel di database
    protected $fillable = [
        'name',
        'no_bpjs',
        'email',
        'keluhan',
        'gender',
        'no_hp',
        'alamat',
        'gol_darah',
        'user_id',
        'status',
        'tanggal_lahir',
    ];
}
