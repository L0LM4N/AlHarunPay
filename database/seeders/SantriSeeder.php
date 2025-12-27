<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SantriSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('santris')->insert([
            [
                'nama'       => 'Ahmad Fauzi',
                'nis'        => 'SNT001',
                'alamat'     => 'Jl. Merdeka No. 10',
                'status'     => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama'       => 'Muhammad Rizki',
                'nis'        => 'SNT002',
                'alamat'     => 'Jl. Ahmad Yani No. 5',
                'status'     => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama'       => 'Abdul Karim',
                'nis'        => 'SNT003',
                'alamat'     => 'Jl. Diponegoro No. 21',
                'status'     => 'nonaktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}