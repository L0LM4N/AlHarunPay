<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tagihan\StoreTagihanRequest;
use App\Models\Tagihan;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class TagihanController extends Controller
{
    /**
     * List tagihan
     * Bisa difilter status: belum / lunas
     */
    public function index(Request $request)
    {
        $query = Tagihan::query()
            ->with('santri:id,nama')
            ->orderByDesc('created_at');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        return response()->json($query->get());
    }

    /**
     * Buat tagihan baru
     */
    public function store(StoreTagihanRequest $request)
    {
        try {
            $tagihan = Tagihan::create([
                'santri_id'     => $request->santri_id,
                'bulan'         => $request->bulan,
                'total_tagihan' => $request->total_tagihan,
                'status'        => 'belum',
            ]);
        } catch (QueryException $e) {
            // kena unique(santri_id, bulan)
            return response()->json([
                'message' => 'Tagihan untuk santri dan bulan ini sudah ada'
            ], 409);
        }

        return response()->json([
            'message' => 'Tagihan berhasil dibuat',
            'data'    => $tagihan
        ], 201);
    }
}