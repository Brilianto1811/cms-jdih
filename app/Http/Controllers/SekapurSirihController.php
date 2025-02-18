<?php

namespace App\Http\Controllers;

use App\Models\SekapurSirih;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Validator;

class SekapurSirihController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view sambutan', only: ['index']),
            new Middleware('permission:edit sambutan', only: ['edit', 'update']),
            new Middleware('permission:create sambutan', only: ['create', 'store']),
            new Middleware('permission:delete sambutan', only: ['destroy']),
        ];
    }

    public function create()
    {
        $sekapursirih = SekapurSirih::first();
        return view('tentang.sambutan.create', compact('sekapursirih'));
    }

    public function store(Request $request)
    {
        // Validasi input tidak boleh kosong
        $request->validate([
            'nama' => 'required|string',
            'jabatan' => 'required|string',
            'sambutan' => 'required|string'
        ]);

        $sekapursirih = SekapurSirih::first(); // Cek apakah sudah ada data

        // dd($tupoksi);

        if ($sekapursirih) {
            $sekapursirih->update([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'sambutan' => $request->sambutan
            ]);
        } else {
            SekapurSirih::create([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'sambutan' => $request->sambutan
            ]);
        }

        return redirect()->back()->with('success', 'Sambutan berhasil disimpan.');
    }
}
