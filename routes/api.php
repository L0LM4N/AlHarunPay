<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TemplateController;
use App\Http\Controllers\Api\SantriController;
use App\Http\Controllers\Api\TagihanController;
use App\Http\Controllers\Api\PembayaranController;

Route::get('/templates', [TemplateController::class, 'index']);

Route::prefix('santri')->group(function () {
    Route::get('/', [SantriController::class, 'index']);
});

Route::prefix('tagihan')->group(function () {
    Route::get('/', [TagihanController::class, 'index']);
    Route::post('/', [TagihanController::class, 'store']);
    Route::get('{id}', [TagihanController::class, 'show']);
    Route::get('{id}/pembayaran', [TagihanController::class, 'pembayaran']);
});

Route::post('/pembayaran', [PembayaranController::class, 'store']);