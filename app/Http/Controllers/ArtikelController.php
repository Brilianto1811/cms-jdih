<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Validator;

class ArtikelController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view artikel', only: ['index']),
            new Middleware('permission:edit artikel', only: ['edit', 'update']),
            new Middleware('permission:create artikel', only: ['create', 'store']),
            new Middleware('permission:delete artikel', only: ['destroy']),
        ];
    }

    public function index()
    {
        $artikel = Artikel::orderBy('tipe', 'ASC')->paginate(5);
        return view('dokumen.artikel.list', compact('artikel'));
    }

    public function create()
    {
        return view('dokumen.artikel.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tipe' => 'nullable|string',
            'judul' => 'required|string',
            'teu_badan' => 'nullable|string',
            'cetakan_edisi' => 'nullable|string',
            'tempat_terbit' => 'nullable|string',
            'penerbit' => 'nullable|string',
            'tahun_terbit' => 'required|integer',
            'sumber' => 'nullable|string',
            'subjek' => 'nullable|string',
            'bahasa' => 'nullable|string',
            'lokasi' => 'nullable|string',
            'bidang_hukum' => 'nullable|string',
        ]);

        if ($validator->passes()) {
            $artikel = new Artikel();
            $artikel->tipe = $request->tipe;
            $artikel->judul = $request->judul;
            $artikel->teu_badan = $request->teu_badan;
            $artikel->cetakan_edisi = $request->cetakan_edisi;
            $artikel->tempat_terbit = $request->tempat_terbit;
            $artikel->penerbit = $request->penerbit;
            $artikel->tahun_terbit = $request->tahun_terbit;
            $artikel->sumber = $request->sumber;
            $artikel->subjek = $request->subjek;
            $artikel->bahasa = $request->bahasa;
            $artikel->lokasi = $request->lokasi;
            $artikel->bidang_hukum = $request->bidang_hukum;

            $artikel->save();

            if ($request->hasFile('file')) {
                foreach ($request->file('file') as $file) {
                    $artikel->addMedia($file)->toMediaCollection('images');
                }
            }

            return redirect()->route('monografi-hukum.list')->with('success', 'Monografi Hukum Berhasil Ditambahkan.');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function edit(string $id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('dokumen.artikel.edit', compact('artikel'));
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'tipe' => 'nullable|string',
            'judul' => 'required|string',
            'teu_badan' => 'nullable|string',
            'cetakan_edisi' => 'nullable|string',
            'tempat_terbit' => 'nullable|string',
            'penerbit' => 'nullable|string',
            'tahun_terbit' => 'required|integer',
            'sumber' => 'nullable|string',
            'subjek' => 'nullable|string',
            'bahasa' => 'nullable|string',
            'lokasi' => 'nullable|string',
            'bidang_hukum' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $artikel = Artikel::findOrFail($id);
        $artikel->update($request->all());

        return redirect()->route('artikel.list')->with('success', 'Artikel Berhasil Diperbarui.');
    }

    public function destroy(Request $request)
    {
        $artikel = Artikel::findOrFail($request->id);
        $artikel->delete();

        return response()->json([
            'status' => true,
            'message' => 'Artikel Berhasil Dihapus.',
        ]);
    }
}
