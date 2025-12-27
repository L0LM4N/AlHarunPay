<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Santri;

class TagihanSeeder extends Seeder
{
    public function run(): void
    {
        $bulan = '2025-01';

        foreach (Santri::all() as $santri) {
            DB::table('tagihans')->updateOrInsert(
                [
                    'santri_id' => $santri->id,
                    'bulan'     => $bulan,
                ],
                [
                    'total_tagihan' => 500000,
                    'status'        => 'belum',
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ]
            );
        }
    }
}