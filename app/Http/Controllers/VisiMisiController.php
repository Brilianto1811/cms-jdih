<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class VisiMisiController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view visi misi', only: ['index']),
            new Middleware('permission:edit visi misi', only: ['edit', 'update']),
            new Middleware('permission:create visi misi', only: ['create', 'store']),
            new Middleware('permission:delete visi misi', only: ['destroy']),
        ];
    }

    public function create()
    {
        $visimisi = VisiMisi::first();
        return view('tentang.visi-misi.create', compact('visimisi'));
    }

    public function store(Request $request)
    {
        // Validasi input tidak boleh kosong
        $request->validate([
            'visi' => 'required|string',
            'misi' => 'required|string',
        ]);

        $visimisi = VisiMisi::first(); // Cek apakah sudah ada data

        // dd($tupoksi);

        if ($visimisi) {
            $visimisi->update([
                'visi' => $request->visi,
                'misi' => $request->misi,
            ]);
        } else {
            VisiMisi::create([
                'visi' => $request->visi,
                'misi' => $request->misi,
            ]);
        }

        return redirect()->back()->with('success', 'Visi Misi berhasil disimpan.');
    }
}
