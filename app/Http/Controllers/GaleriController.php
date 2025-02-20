<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class GaleriController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view foto', only: ['index']),
            new Middleware('permission:edit foto', only: ['edit']),
            new Middleware('permission:create foto', only: ['create']),
            new Middleware('permission:delete foto', only: ['destroy']),
            new Middleware('permission:view video', only: ['index']),
            new Middleware('permission:edit video', only: ['edit']),
            new Middleware('permission:create video', only: ['create']),
            new Middleware('permission:delete video', only: ['destroy']),
        ];
    }

    /**
     * Menampilkan daftar struktur organisasi
     */

    public function indexFoto(Request $request)
    {
        if ($request->ajax()) {
            $data = Galeri::where('tipe', 1)->select('id', 'nama', 'tgl_galeri');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('tgl_galeri', function ($row) {
                    return \Carbon\Carbon::parse($row->tgl_galeri)
                        ->locale('id')->isoFormat('dddd, D MMMM YYYY');
                })
                ->addColumn('file', function ($item) {
                    $imageUrl = $item->getFirstMediaUrl('struktur_files', 'public');

                    if ($imageUrl) {
                        return '<img src="' . $imageUrl . '" alt="Gambar" class="w-16 h-16 rounded-md">';
                    }
                    return 'Tidak ada gambar';
                })
                ->rawColumns(['file', 'action']) // Tambahkan 'file' di sini
                ->addColumn('action', function ($item) {
                    return view('galeri.foto.action', compact('item'))->render();
                })
                ->make(true);
        }

        return view('galeri.foto.list');
    }

    public function indexVideo(Request $request)
    {
        if ($request->ajax()) {
            $data = Galeri::where('tipe', 2)->select('id', 'nama', 'tgl_galeri', 'url_video', 'deskripsi');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('tgl_galeri', function ($row) {
                    return \Carbon\Carbon::parse($row->tgl_galeri)
                        ->locale('id')->isoFormat('dddd, D MMMM YYYY');
                })
                ->addColumn('url_video', function ($row) {
                    return '<a href="' . $row->url_video . '" target="_blank" style="color: blue; text-decoration: none;" onmouseover="this.style.textDecoration=\'underline\'" onmouseout="this.style.textDecoration=\'none\'">' . $row->url_video . '</a>';
                })
                ->rawColumns(['url_video', 'action'])
                ->addColumn('action', function ($item) {
                    return view('galeri.video.action', compact('item'))->render();
                })
                ->make(true);
        }

        return view('galeri.video.list');
    }

    /**
     * Menampilkan form tambah struktur organisasi
     */
    public function createFoto()
    {
        return view('galeri.foto.create');
    }

    public function createVideo()
    {
        return view('galeri.video.create');
    }

    /**
     * Menyimpan data struktur organisasi
     */
    public function storeFoto(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama'   => 'required',
            'tgl_galeri'   => 'required',
            'file.*' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->passes()) {
            $galeri = new Galeri();
            $galeri->nama = $request->nama;
            $galeri->tgl_galeri = $request->tgl_galeri;
            $galeri->tipe = 1;

            $galeri->save();

            if ($request->hasFile('file')) {
                foreach ($request->file('file') as $file) {
                    $galeri->addMedia($file)->toMediaCollection('foto', 'public');
                }
            }

            return redirect()->route('foto.list')->with('success', 'Foto Berhasil Ditambahkan.');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function storeVideo(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama'   => 'required',
            'tgl_galeri'   => 'required',
            'url_video'   => 'required',
            'deskripsi'   => 'required',
        ]);

        if ($validator->passes()) {
            $galeri = new Galeri();
            $galeri->nama = $request->nama;
            $galeri->tgl_galeri = $request->tgl_galeri;
            $galeri->url_video = $request->url_video;
            $galeri->deskripsi = $request->deskripsi;
            $galeri->tipe = 2;

            $galeri->save();

            return redirect()->route('video.list')->with('success', 'Video Berhasil Ditambahkan.');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    /**
     * Menampilkan form edit struktur organisasi
     */
    public function editFoto($id)
    {
        $galeri = Galeri::findOrFail($id);
        $file = $galeri->getFirstMediaUrl('struktur_files');

        return view('galeri.foto.edit', compact('galeri', 'file'));
    }

    public function editVideo($id)
    {
        $galeri = Galeri::findOrFail($id);

        return view('galeri.video.edit', compact('galeri'));
    }

    /**
     * Memperbarui data struktur organisasi
     */
    public function updateFoto(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama'   => 'required',
            'tgl_galeri'   => 'required',
            'file.*'    => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $galeri = Galeri::findOrFail($id);
        $galeri->update([
            'nama'   => $request->nama,
            'tgl_galeri'   => $request->tgl_galeri,
        ]);

        // Cek jika ada file baru, hapus file lama dan upload baru
        if ($request->hasFile('file')) {
            $galeri->clearMediaCollection('foto');
            $galeri->addMedia($request->file('file'))->toMediaCollection('foto');
        }

        return redirect()->route('foto.list')->with('success', 'Foto Berhasil Diperbarui.');
    }

    public function updateVideo(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'judul'   => 'required',
            'tgl_galeri'   => 'required',
            'url_video'   => 'required',
            'deskripsi'   => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $galeri = Galeri::findOrFail($id);
        $galeri->update([
            'judul'   => $request->judul,
            'tgl_galeri'   => $request->tgl_galeri,
            'url_video'   => $request->url_video,
            'deskripsi'   => $request->deskripsi,
        ]);

        return redirect()->route('video.list')->with('success', 'Video Berhasil Diperbarui.');
    }

    /**
     * Menghapus data struktur organisasi
     */
    public function destroyFoto(Request $request)
    {
        $id = $request->id;
        $galeri = Galeri::find($id);

        if (!$galeri) {
            return response()->json(['status' => false, 'message' => 'Foto tidak ditemukan.'], 404);
        }

        // Hapus file terkait menggunakan Spatie Media Library
        $galeri->clearMediaCollection('foto');

        // Hapus data dari database
        $galeri->delete();

        return response()->json(['status' => true, 'message' => 'Foto Berhasil Dihapus.']);
    }

    public function destroyVideo(Request $request)
    {
        $id = $request->id;
        $galeri = Galeri::find($id);

        if (!$galeri) {
            return response()->json(['status' => false, 'message' => 'Video tidak ditemukan.'], 404);
        }

        // Hapus data dari database
        $galeri->delete();

        return response()->json(['status' => true, 'message' => 'Video Berhasil Dihapus.']);
    }
}
