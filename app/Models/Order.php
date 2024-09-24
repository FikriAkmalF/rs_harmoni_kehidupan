<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order'; // Nama tabel di database
    protected $fillable = [
        'name',
        'no_hp',
        'nama_obat',
        'qty',
        'total_harga',
        'status',
    ];
}
