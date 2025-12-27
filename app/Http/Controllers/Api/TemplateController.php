<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index(Request $request)
    {
        return response()->json([
            'tagihan' => $this->tagihanTemplate(),
            'pembayaran' => $this->pembayaranTemplate(),
            'master' => $this->masterTemplate()
        ]);
    }

    protected function tagihanTemplate(): array
    {
        return [
            'description' => 'Template input tagihan santri',
            'columns' => [
                [
                    'key' => 'santri_id',
                    'label' => 'Santri',
                    'type' => 'relation',
                    'source' => 'santri',
                    'required' => true
                ],
                [
                    'key' => 'bulan',
                    'label' => 'Bulan Tagihan',
                    'type' => 'string',
                    'example' => '2025-01',
                    'required' => true
                ],
                [
                    'key' => 'total_tagihan',
                    'label' => 'Total Tagihan',
                    'type' => 'number',
                    'required' => true
                ],
                [
                    'key' => 'jatuh_tempo',
                    'label' => 'Jatuh Tempo',
                    'type' => 'date',
                    'required' => true
                ]
            ]
        ];
    }

    protected function pembayaranTemplate(): array
    {
        return [
            'description' => 'Template input pembayaran tagihan',
            'columns' => [
                [
                    'key' => 'tagihan_id',
                    'label' => 'Tagihan',
                    'type' => 'relation',
                    'source' => 'tagihan',
                    'required' => true
                ],
                [
                    'key' => 'tanggal_bayar',
                    'label' => 'Tanggal Bayar',
                    'type' => 'date',
                    'required' => true
                ],
                [
                    'key' => 'jumlah_bayar',
                    'label' => 'Jumlah Bayar',
                    'type' => 'number',
                    'required' => true
                ],
                [
                    'key' => 'metode',
                    'label' => 'Metode Pembayaran',
                    'type' => 'enum',
                    'options' => ['cash', 'transfer', 'lainnya'],
                    'required' => false
                ]
            ]
        ];
    }

    protected function masterTemplate(): array
    {
        return [
            'santri' => [
                'columns' => [
                    'id',
                    'nama',
                    'nis',
                    'status'
                ]
            ],
            'tagihan' => [
                'columns' => [
                    'id',
                    'santri_id',
                    'bulan',
                    'total_tagihan',
                    'status'
                ]
            ]
        ];
    }
}