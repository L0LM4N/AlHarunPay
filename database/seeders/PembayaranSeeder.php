<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Tagihan;

class PembayaranSeeder extends Seeder
{
    public function run(): void
    {
        $tagihans = Tagihan::where('status', 'belum')->get();

        foreach ($tagihans as $tagihan) {
            DB::table('pembayarans')->insert([
                'tagihan_id'   => $tagihan->id,
                'tanggal_bayar'=> now()->toDateString(),
                'jumlah_bayar' => $tagihan->total_tagihan,
                'metode'       => 'cash',
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);

            // update status tagihan
            $tagihan->update([
                'status' => 'lunas',
            ]);
        }
    }
}