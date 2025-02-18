<?php

namespace App\Http\Controllers;

use App\Models\Peraturan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Validator;

class PeraturanController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view peraturan', only: ['index']),
            new Middleware('permission:edit peraturan', only: ['edit', 'update']),
            new Middleware('permission:create peraturan', only: ['create', 'store']),
            new Middleware('permission:delete peraturan', only: ['destroy']),
        ];
    }

    public function index()
    {
        $peraturan = Peraturan::orderBy('tipe_dokumen', 'ASC')->paginate(5);
        return view('dokumen.peraturan.list', compact('peraturan'));
    }

    public function create()
    {
        return view('dokumen.peraturan.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'tipe_dokumen' => 'required',
            'judul' => 'required',
            'teu_badan' => 'required',
            'no_peraturan' => 'required|integer',
            'tahun' => 'required|integer',
            'jenis' => 'required',
            'singkatan_jenis' => 'required',
            'tempat_penetapan' => 'required',
            'tgl_penetapan' => 'required|date',
            'tgl_perundangan' => 'required|date',
            'sumber' => 'required',
            'subjek' => 'required',
            'status' => 'required',
            'status_terbit' => 'required',
            'keterangan_status' => 'required',
            'bahasa' => 'required',
            'lokasi' => 'required',
            'bidang_hukum' => 'required',
            'file' => 'required|array',
            'file.*' => 'file|mimes:jpg,jpeg,png|max:2048',
            'file_abstraksi' => 'required|array',
            'file_abstraksi.*' => 'file|mimes:jpg,jpeg,png|max:2048',
        ]);
        // dd($request);

        if ($validator->passes()) {
            $peraturan = new Peraturan();
            $peraturan->tipe_dokumen = $request->tipe_dokumen;
            $peraturan->judul = $request->judul;
            $peraturan->teu_badan = $request->teu_badan;
            $peraturan->no_peraturan = $request->no_peraturan;
            $peraturan->tahun = $request->tahun;
            $peraturan->jenis = $request->jenis;
            $peraturan->singkatan_jenis = $request->singkatan_jenis;
            $peraturan->tempat_penetapan = $request->tempat_penetapan;
            $peraturan->tgl_penetapan = $request->tgl_penetapan;
            $peraturan->tgl_perundangan = $request->tgl_perundangan;
            $peraturan->sumber = $request->sumber;
            $peraturan->subjek = $request->subjek;
            $peraturan->status = $request->status;
            $peraturan->status_terbit = $request->status_terbit;
            $peraturan->keterangan_status = $request->keterangan_status;
            $peraturan->bahasa = $request->bahasa;
            $peraturan->lokasi = $request->lokasi;
            $peraturan->bidang_hukum = $request->bidang_hukum;

            $peraturan->save();

            if ($request->hasFile('file')) {
                foreach ($request->file('file') as $file) {
                    $peraturan->addMedia($file)->toMediaCollection('images');
                }
            }

            if ($request->hasFile('file_abstraksi')) {
                foreach ($request->file('file_abstraksi') as $file) {
                    $peraturan->addMedia($file)->toMediaCollection('abstraksi');
                }
            }

            return redirect()->route('peraturan.list')->with('success', 'Peraturan Berhasil Ditambahkan.');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }


    public function edit(string $id)
    {
        $peraturan = Peraturan::findOrFail($id);
        return view('dokumen.peraturan.edit', compact('peraturan'));
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'tipe_dokumen' => 'required|min:3',
            'judul' => 'required',
            'teu_badan' => 'required|min:3',
            'no_peraturan' => 'required|integer',
            'tahun' => 'required|integer',
            'jenis' => 'required',
            'singkatan_jenis' => 'required',
            'tempat_penetapan' => 'required',
            'tgl_penetapan' => 'required|date',
            'tgl_perundangan' => 'required|date',
            'sumber' => 'required',
            'subjek' => 'required',
            'keterangan_status' => 'nullable',
            'bahasa' => 'required',
            'lokasi' => 'required',
            'bidang_hukum' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $peraturan = Peraturan::findOrFail($id);
        $peraturan->update($request->all());

        return redirect()->route('peraturan.list')->with('success', 'Peraturan berhasil diperbarui.');
    }

    public function destroy(Request $request)
    {
        $peraturan = Peraturan::findOrFail($request->id);
        $peraturan->delete();

        return response()->json([
            'status' => true,
            'message' => 'Peraturan Berhasil Dihapus.',
        ]);
    }
}
