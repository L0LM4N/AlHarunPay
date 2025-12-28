<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tagihans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('santri_id')
                  ->constrained('santris')
                  ->cascadeOnDelete();

            $table->string('bulan', 7); // YYYY-MM
            $table->decimal('total_tagihan', 15, 2);

            $table->enum('status', ['belum', 'lunas'])
                  ->default('belum');

            $table->timestamps();

            $table->unique(['santri_id', 'bulan']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tagihans');
    }
};
