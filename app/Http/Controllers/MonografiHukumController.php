<?php

namespace App\Http\Controllers;

use App\Models\MonografiHukum;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Validator;

class MonografiHukumController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view monografi hukum', only: ['index']),
            new Middleware('permission:edit monografi hukum', only: ['edit', 'update']),
            new Middleware('permission:create monografi hukum', only: ['create', 'store']),
            new Middleware('permission:delete monografi hukum', only: ['destroy']),
        ];
    }

    public function index()
    {
        $monografi = MonografiHukum::orderBy('tipe', 'ASC')->paginate(5);
        return view('dokumen.monografi-hukum.list', compact('monografi'));
    }

    public function create()
    {
        return view('dokumen.monografi-hukum.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'deskripsi_fisik' => 'nullable|string',
            'no_induk_buku' => 'nullable|string',
            'bidang_hukum' => 'required|string',
            'lokasi' => 'required|string',
            'bahasa' => 'required|string',
            'isbn_issn' => 'nullable|string',
            'subjek' => 'required|string',
            'sumber' => 'required|string',
            'tipe' => 'required|string',
            'tahun_terbit' => 'required|integer',
            'penerbit' => 'required|string',
            'tempat_terbit' => 'required|string',
            'cetakan_edisi' => 'nullable|string',
            'nomor_panggil' => 'nullable|string',
            'teu_badan' => 'nullable|string',
            'judul' => 'required|string',
            'keterangan_status' => 'nullable|string',
            'file' => 'nullable|array',
            'file.*' => 'file|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->passes()) {
            $monografi = new MonografiHukum();
            $monografi->deskripsi_fisik = $request->deskripsi_fisik;
            $monografi->no_induk_buku = $request->no_induk_buku;
            $monografi->bidang_hukum = $request->bidang_hukum;
            $monografi->lokasi = $request->lokasi;
            $monografi->bahasa = $request->bahasa;
            $monografi->isbn_issn = $request->isbn_issn;
            $monografi->subjek = $request->subjek;
            $monografi->sumber = $request->sumber;
            $monografi->tipe = $request->tipe;
            $monografi->tahun_terbit = $request->tahun_terbit;
            $monografi->penerbit = $request->penerbit;
            $monografi->tempat_terbit = $request->tempat_terbit;
            $monografi->cetakan_edisi = $request->cetakan_edisi;
            $monografi->nomor_panggil = $request->nomor_panggil;
            $monografi->teu_badan = $request->teu_badan;
            $monografi->judul = $request->judul;

            $monografi->save();

            if ($request->hasFile('file')) {
                foreach ($request->file('file') as $file) {
                    $monografi->addMedia($file)->toMediaCollection('images');
                }
            }

            return redirect()->route('monografi-hukum.list')->with('success', 'Monografi Hukum Berhasil Ditambahkan.');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }


    public function edit(string $id)
    {
        $monografi = MonografiHukum::findOrFail($id);
        return view('dokumen.monografi-hukum.edit', compact('monografi'));
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'deskripsi_fisik' => 'nullable|string',
            'no_induk_buku' => 'nullable|string',
            'bidang_hukum' => 'required|string',
            'lokasi' => 'required|string',
            'bahasa' => 'required|string',
            'isbn_issn' => 'nullable|string',
            'subjek' => 'required|string',
            'sumber' => 'required|string',
            'tipe' => 'required|string',
            'tahun_terbit' => 'required|integer',
            'penerbit' => 'required|string',
            'tempat_terbit' => 'required|string',
            'cetakan_edisi' => 'nullable|string',
            'nomor_panggil' => 'nullable|string',
            'teu_badan' => 'nullable|string',
            'judul' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $monografi = MonografiHukum::findOrFail($id);
        $monografi->update($request->all());

        return redirect()->route('monografi-hukum.list')->with('success', 'Monografi Hukum berhasil diperbarui.');
    }

    public function destroy(Request $request)
    {
        $monografi = MonografiHukum::findOrFail($request->id);
        $monografi->delete();

        return response()->json([
            'status' => true,
            'message' => 'Monografi Hukum Berhasil Dihapus.',
        ]);
    }
}
