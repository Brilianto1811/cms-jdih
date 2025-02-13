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
            'sumber' => 'required',
            'subjek' => 'required',
            'status_peraturan' => 'required',
            'keterangan_status' => 'nullable',
            'bahasa' => 'required',
            'lokasi' => 'required',
            'bidang_hukum' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Peraturan::create($request->all());

        return redirect()->route('peraturan.list')->with('success', 'Peraturan Berhasil Ditambahkan.');
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
            'sumber' => 'required',
            'subjek' => 'required',
            'status_peraturan' => 'required',
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
