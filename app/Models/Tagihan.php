<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    protected $fillable = [
        'santri_id',
        'bulan',
        'total_tagihan',
        'status',
    ];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }

    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class);
    }

    public function scopeBelum($query)
    {
        return $query->where('status', 'belum');
    }

    public function scopeLunas($query)
    {
        return $query->where('status', 'lunas');
    }
}
