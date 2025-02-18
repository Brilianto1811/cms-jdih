<?php

namespace App\Http\Controllers;

use App\Models\Yurisprudensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class YurisprudensiController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view yurisprudensi', only: ['index']),
            new Middleware('permission:edit yurisprudensi', only: ['edit', 'update']),
            new Middleware('permission:create yurisprudensi', only: ['create', 'store']),
            new Middleware('permission:delete yurisprudensi', only: ['destroy']),
        ];
    }

    public function index()
    {
        $yurisprudensi = Yurisprudensi::orderBy('tipe', 'ASC')->paginate(5);
        return view('dokumen.yurisprudensi.list', compact('yurisprudensi'));
    }

    public function create()
    {
        return view('dokumen.yurisprudensi.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tipe' => 'required|string',
            'judul' => 'required|string',
            'teu_badan' => 'nullable|string',
            'nomor_putusan' => 'required|string',
            'jenis' => 'required|string',
            'jenis_perkara' => 'required|string',
            'singkatan_jenis_peradilan' => 'nullable|string',
            'jenis_peradilan' => 'required|string',
            'singkatan_jenis' => 'nullable|string',
            'tempat_peradilan' => 'required|string',
            'tempat_terbit' => 'nullable|string',
            'tanggal_penetapan' => 'required|date',
            'tahun_terbit' => 'required|integer',
            'sumber' => 'required|string',
            'subjek' => 'required|string',
            'status' => 'nullable|string',
            'bahasa' => 'required|string',
            'lokasi' => 'required|string',
            'bidang_hukum' => 'required|string',
        ]);

        if ($validator->passes()) {
            $yurisprudensi = new Yurisprudensi();
            $yurisprudensi->tipe = $request->tipe;
            $yurisprudensi->judul = $request->judul;
            $yurisprudensi->teu_badan = $request->teu_badan;
            $yurisprudensi->nomor_putusan = $request->nomor_putusan;
            $yurisprudensi->jenis = $request->jenis;
            $yurisprudensi->jenis_perkara = $request->jenis_perkara;
            $yurisprudensi->singkatan_jenis_peradilan = $request->singkatan_jenis_peradilan;
            $yurisprudensi->singkatan_jenis_peradilan = $request->singkatan_jenis_peradilan;
            $yurisprudensi->jenis_peradilan = $request->jenis_peradilan;
            $yurisprudensi->singkatan_jenis = $request->singkatan_jenis;
            $yurisprudensi->tempat_peradilan = $request->tempat_peradilan;
            $yurisprudensi->tempat_terbit = $request->tempat_terbit;
            $yurisprudensi->tanggal_penetapan = $request->tanggal_penetapan;
            $yurisprudensi->tahun_terbit = $request->tahun_terbit;
            $yurisprudensi->sumber = $request->sumber;
            $yurisprudensi->subjek = $request->subjek;
            $yurisprudensi->status = $request->status;
            $yurisprudensi->bahasa = $request->bahasa;
            $yurisprudensi->lokasi = $request->lokasi;
            $yurisprudensi->bidang_hukum = $request->bidang_hukum;

            $yurisprudensi->save();

            if ($request->hasFile('file')) {
                foreach ($request->file('file') as $file) {
                    $yurisprudensi->addMedia($file)->toMediaCollection('images');
                }
            }

            return redirect()->route('yurisprudensi.list')->with('success', 'Yurisprudensi Berhasil Ditambahkan.');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function edit(string $id)
    {
        $yurisprudensi = Yurisprudensi::findOrFail($id);
        return view('dokumen.yurisprudensi.edit', compact('yurisprudensi'));
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'tipe' => 'required|string',
            'judul' => 'required|string',
            'teu_badan' => 'nullable|string',
            'nomor_putusan' => 'required|string',
            'jenis' => 'required|string',
            'jenis_perkara' => 'required|string',
            'singkatan_jenis_peradilan' => 'nullable|string',
            'jenis_peradilan' => 'required|string',
            'singkatan_jenis' => 'nullable|string',
            'tempat_peradilan' => 'required|string',
            'tempat_terbit' => 'nullable|string',
            'tanggal_penetapan' => 'required|date',
            'tahun_terbit' => 'required|integer',
            'sumber' => 'required|string',
            'subjek' => 'required|string',
            'status' => 'nullable|string',
            'bahasa' => 'required|string',
            'lokasi' => 'required|string',
            'bidang_hukum' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $yurisprudensi = Yurisprudensi::findOrFail($id);
        $yurisprudensi->update($request->all());

        return redirect()->route('yurisprudensi.list')->with('success', 'Yurisprudensi Berhasil Diperbarui.');
    }

    public function destroy(Request $request)
    {
        $yurisprudensi = Yurisprudensi::findOrFail($request->id);
        $yurisprudensi->delete();

        return response()->json([
            'status' => true,
            'message' => 'Yurisprudensi Berhasil Dihapus.',
        ]);
    }
}
