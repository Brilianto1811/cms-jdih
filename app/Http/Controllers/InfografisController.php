<?php

namespace App\Http\Controllers;

use App\Models\Infografis;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Validator;

class InfografisController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view infografis', only: ['index']),
            new Middleware('permission:edit infografis', only: ['edit']),
            new Middleware('permission:create infografis', only: ['create']),
            new Middleware('permission:delete infografis', only: ['destroy']),
        ];
    }

    /**
     * Menampilkan daftar struktur organisasi
     */
    public function index()
    {
        $infografis = Infografis::orderBy('id', 'ASC')->paginate(5);

        return view('infografis.list', compact('infografis'));
    }

    /**
     * Menampilkan form tambah struktur organisasi
     */
    public function create()
    {
        return view('infografis.create');
    }

    /**
     * Menyimpan data struktur organisasi
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'judul'   => 'required',
            'file.*' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->passes()) {
            $infografis = new Infografis();
            $infografis->judul = $request->judul;

            $infografis->save();
            // dd($infografis->getMedia('struktur_files'));

            // if ($request->hasFile('file')) {
            //     foreach ($request->file('file') as $file) {
            //         $infografis->addMedia($file)->toMediaCollection('struktur_files', 'public');
            //     }
            // }

            if ($request->hasFile('file')) {
                $infografis->addMedia($request->file('file')[0])->toMediaCollection('struktur_files', 'public');
            }

            return redirect()->route('infografis.list')->with('success', 'Infografis Berhasil Ditambahkan.');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    /**
     * Menampilkan form edit struktur organisasi
     */
    public function edit($id)
    {
        $infografis = Infografis::findOrFail($id);
        $file = $infografis->getFirstMediaUrl('struktur_files');

        return view('infografis.edit', compact('struktur', 'file'));
    }

    /**
     * Memperbarui data struktur organisasi
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'judul'   => 'required',
            'file.*'    => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $infografis = Infografis::findOrFail($id);
        $infografis->update([
            'judul'   => $request->judul,
        ]);

        // Cek jika ada file baru, hapus file lama dan upload baru
        if ($request->hasFile('file')) {
            $infografis->clearMediaCollection('struktur_files');
            $infografis->addMedia($request->file('file'))->toMediaCollection('struktur_files');
        }

        return redirect()->route('infografis.list')->with('success', 'Infografis Berhasil Diperbarui.');
    }

    /**
     * Menghapus data struktur organisasi
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $infografis = Infografis::find($id);

        if (!$infografis) {
            return response()->json(['status' => false, 'message' => 'Struktur tidak ditemukan.'], 404);
        }

        // Hapus file terkait menggunakan Spatie Media Library
        $infografis->clearMediaCollection('struktur_files');

        // Hapus data dari database
        $infografis->delete();

        return response()->json(['status' => true, 'message' => 'Infografis Berhasil Dihapus.']);
    }

    // public function destroy(Request $request)
    // {
    //     $id = $request->id;
    //     $infografis = Infografis::find($id);

    //     if ($infografis == null) {
    //         session()->flash('error', 'Article not found');
    //         return response()->json([
    //             'status' => false
    //         ]);
    //     }
    //     $infografis->delete();

    //     session()->flash('success', 'Infografis Berhasil Dihapus.');
    //     return response()->json([
    //         'status' => true
    //     ]);
    // }
}
