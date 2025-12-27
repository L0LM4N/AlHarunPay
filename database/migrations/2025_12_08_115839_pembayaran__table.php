<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
      Schema::create('pembayarans', function (Blueprint $table) 
      {
        $table->id();
        $table->foreignId('tagihan_id')->constrained('tagihans')->cascadeOnDelete();
        $table->date('tanggal_bayar');
        $table->double('jumlah_bayar');
        $table->string('metode')->nullable();
        $table->timestamps();
        }
      );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExist('pembayarans');
    }
};
