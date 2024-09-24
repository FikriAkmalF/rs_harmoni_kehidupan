<?php

namespace Database\Seeders;

use App\Models\Obat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'nama_obat'=>'Betadine Antiseptic',
                'harga'=>'20000',
                'stok'=>'20',
            ],
            [
                'nama_obat'=>'Ponstan',
                'harga'=>'40000',
                'stok'=>'20',
            ],
            [
                'nama_obat'=>'Paracetamol',
                'harga'=>'5000',
                'stok'=>'20',
            ],
            [
                'nama_obat'=>'Isosorbide Dinitrate',
                'harga'=>'15000',
                'stok'=>'20',
            ],
            [
                'nama_obat'=>'Insto',
                'harga'=>'25000',
                'stok'=>'20',
            ],
        ];

        foreach($userData as $key => $val){
            Obat::create($val);
        }
    }
}
