<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    protected $fillable = [
      'nama',
      'nis',
      'alamat',
      'status',
      ];
      
      public function pembayaran()
      {
        return $this->hasMany(Pembayaran::class);
      }
      
      public function tagihan()
      {
        return $this->hasMany(tagihan::class);
      }
      
}
