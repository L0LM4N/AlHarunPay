<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pembayaran\StorePembayaranRequest;
use App\Models\Tagihan;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function store(StorePembayaranRequest $request)
    {
        DB::transaction(function () use ($request) {

            $tagihan = Tagihan::lockForUpdate()->findOrFail($request->tagihan_id);

            if ($tagihan->status === 'lunas') {
                abort(400, 'Tagihan sudah lunas');
            }

            Pembayaran::create([
                'tagihan_id'   => $tagihan->id,
                'tanggal_bayar'=> $request->tanggal_bayar,
                'jumlah'       => $request->jumlah,
            ]);

            $totalBayar = $tagihan->pembayaran()->sum('jumlah');

            if ($totalBayar >= $tagihan->total_tagihan) {
                $tagihan->update(['status' => 'lunas']);
            }
        });

        return response()->json([
            'message' => 'Pembayaran berhasil'
        ], 201);
    }
}