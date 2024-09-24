<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=>'Lucy',
                'email'=>'lucy@gmail.com',
                'role'=>'perawat',
                'spesialis'=>'perawat',
                'password'=>bcrypt('lucy1234')
            ],
            [
                'name'=>'Putri',
                'email'=>'putri@gmail.com',
                'role'=>'apoteker',
                'spesialis'=>'apoteker',
                'password'=>bcrypt('putri123')
            ],
            [
                'name'=>'Hediyanto',
                'email'=>'herdiyanto@gmail.com',
                'role'=>'apoteker',
                'spesialis'=>'apoteker',
                'password'=>bcrypt('hediyanto123')
            ],
            [
                'name'=>'Dr. Budi Santoso',
                'email'=>'budi@gmail.com',
                'role'=>'dokter',
                'spesialis'=>'Dokter Umum',
                'password'=>bcrypt('budi1234')
            ],
            [
                'name'=>'Dr. Andi Wirawan',
                'email'=>'andi@gmail.com',
                'role'=>'dokter',
                'spesialis'=>'Gigi',
                'password'=>bcrypt('andi1234')
            ],
            [
                'name'=>'Dr. Dwi Haryanto',
                'email'=>'dwi@gmail.com',
                'role'=>'dokter',
                'spesialis'=>'Anak',
                'password'=>bcrypt('andi1234')
            ],
            [
                'name'=>'Dr. Irwan Raharja',
                'email'=>'irwan@gmail.com',
                'role'=>'dokter',
                'spesialis'=>'Jantung',
                'password'=>bcrypt('irwan1234'),
            ],
            [
                'name'=>'Dr. Bambang Hermawan',
                'email'=>'bambang@gmail.com',
                'role'=>'dokter',
                'spesialis'=>'Mata',
                'password'=>bcrypt('bambang1234')
            ],
            [
                'name'=>'Hercules',
                'email'=>'hercules@gmail.com',
                'role'=>'pasien',
                'spesialis'=>'pasien',
                'password'=>bcrypt('hercules1234')
            ],
            [
                'name'=>'Wawan',
                'email'=>'wawan@gmail.com',
                'role'=>'pasien',
                'spesialis'=>'pasien',
                'password'=>bcrypt('wawan1234')
            ],
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}