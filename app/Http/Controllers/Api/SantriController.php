<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Santri;

class SantriController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(
            Santri::where('status', 'aktif')
                ->orderBy('nama')
                ->get(['id', 'nama', 'nis'])
        );
    }
}
