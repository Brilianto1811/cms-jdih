<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiJdihController extends Controller
{
    private $baseUrl = 'https://jdih.bogorkab.go.id/integrasi';

    // **1. GET: Ambil Semua Data**
    public function index()
    {
        $response = Http::get($this->baseUrl);

        if ($response->successful()) {
            return response()->json($response->json());
        }

        return response()->json(['error' => 'Gagal mengambil data'], $response->status());
    }

    // **2. POST: Tambah Data Baru**
    public function store(Request $request)
    {
        $response = Http::post($this->baseUrl, $request->all());

        if ($response->successful()) {
            return response()->json($response->json());
        }

        return response()->json(['error' => 'Gagal menambah data'], $response->status());
    }

    // **3. GET: Ambil Detail Data**
    public function show($id)
    {
        $response = Http::get("$this->baseUrl/$id");

        if ($response->successful()) {
            return response()->json($response->json());
        }

        return response()->json(['error' => 'Data tidak ditemukan'], $response->status());
    }

    // **4. PUT: Update Data**
    public function update(Request $request, $id)
    {
        $response = Http::put("$this->baseUrl/$id", $request->all());

        if ($response->successful()) {
            return response()->json($response->json());
        }

        return response()->json(['error' => 'Gagal memperbarui data'], $response->status());
    }

    // **5. DELETE: Hapus Data**
    public function destroy($id)
    {
        $response = Http::delete("$this->baseUrl/$id");

        if ($response->successful()) {
            return response()->json(['message' => 'Data berhasil dihapus']);
        }

        return response()->json(['error' => 'Gagal menghapus data'], $response->status());
    }
}
