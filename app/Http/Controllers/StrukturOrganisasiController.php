<?php

namespace App\Http\Controllers;

use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Validator;

class StrukturOrganisasiController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view struktur organisasi', only: ['index']),
            new Middleware('permission:edit struktur organisasi', only: ['edit']),
            new Middleware('permission:create struktur organisasi', only: ['create']),
            new Middleware('permission:delete struktur organisasi', only: ['destroy']),
        ];
    }

    /**
     * Menampilkan daftar struktur organisasi
     */
    public function index()
    {
        $struktur = StrukturOrganisasi::orderBy('urutan', 'ASC')->paginate(5);
        return view('tentang.struktur-organisasi.list', compact('struktur'));
    }

    /**
     * Menampilkan form tambah struktur organisasi
     */
    public function create()
    {
        return view('tentang.struktur-organisasi.create');
    }

    /**
     * Menyimpan data struktur organisasi
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama'   => 'required|min:3',
            'jabatan' => 'required|min:3',
            'urutan'  => 'required|integer',
            'file.*' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->passes()) {
            $struktur = new StrukturOrganisasi();
            $struktur->nama = $request->nama;
            $struktur->jabatan = $request->jabatan;
            $struktur->urutan = $request->urutan;

            $struktur->save();

            if ($request->hasFile('file')) {
                foreach ($request->file('file') as $file) {
                    $struktur->addMedia($file)->toMediaCollection('struktur_files');
                }
            }

            return redirect()->route('struktur-organisasi.list')->with('success', 'Struktur Organisasi Berhasil Ditambahkan.');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    /**
     * Menampilkan form edit struktur organisasi
     */
    public function edit($id)
    {
        $struktur = StrukturOrganisasi::findOrFail($id);
        $file = $struktur->getFirstMediaUrl('struktur_files');

        return view('struktur-organisasi.edit', compact('struktur', 'file'));
    }

    /**
     * Memperbarui data struktur organisasi
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama'   => 'required|min:3',
            'jabatan' => 'required|min:3',
            'urutan'  => 'required|integer',
            'file'    => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $struktur = StrukturOrganisasi::findOrFail($id);
        $struktur->update([
            'nama'   => $request->nama,
            'jabatan' => $request->jabatan,
            'urutan'  => $request->urutan,
        ]);

        // Cek jika ada file baru, hapus file lama dan upload baru
        if ($request->hasFile('file')) {
            $struktur->clearMediaCollection('struktur_files');
            $struktur->addMedia($request->file('file'))->toMediaCollection('struktur_files');
        }

        return redirect()->route('struktur-organisasi.list')->with('success', 'Struktur Organisasi Berhasil Diperbarui.');
    }

    /**
     * Menghapus data struktur organisasi
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $struktur = StrukturOrganisasi::find($id);

        if (!$struktur) {
            return response()->json(['status' => false, 'message' => 'Struktur tidak ditemukan.'], 404);
        }

        // Hapus file terkait menggunakan Spatie Media Library
        $struktur->clearMediaCollection('struktur_files');

        // Hapus data dari database
        $struktur->delete();

        return response()->json(['status' => true, 'message' => 'Struktur Organisasi Berhasil Dihapus.']);
    }
}
