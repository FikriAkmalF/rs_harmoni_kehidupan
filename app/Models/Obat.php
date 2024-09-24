<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'obat'; // Nama tabel di database
    protected $fillable = [
        'nama_obat',
        'harga',
        'jumlah',
    ];
}
