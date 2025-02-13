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

        MonografiHukum::create($request->all());

        return redirect()->route('monografi-hukum.list')->with('success', 'Monografi Hukum Berhasil Ditambahkan.');
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
