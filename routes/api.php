<?php

use App\Http\Controllers\ApiJdihController;
use Illuminate\Support\Facades\Route;

Route::get('/jdih', [ApiJdihController::class, 'index']);         // Ambil semua data
Route::post('/jdih', [ApiJdihController::class, 'store']);        // Tambah data
Route::get('/jdih/{id}', [ApiJdihController::class, 'show']);     // Ambil detail data
Route::put('/jdih/{id}', [ApiJdihController::class, 'update']);   // Update data
Route::delete('/jdih/{id}', [ApiJdihController::class, 'destroy']); // Hapus data
