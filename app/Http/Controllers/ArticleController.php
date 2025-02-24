<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class ArticleController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view articles', only: ['index']),
            new Middleware('permission:edit articles', only: ['edit']),
            new Middleware('permission:create articles', only: ['create']),
            new Middleware('permission:delete articles', only: ['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $articles = Articles::orderBy('id', 'DESC')->paginate(5);
    //     return view('articles.list', [
    //         'articles' => $articles,
    //     ]);
    // }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Articles::latest()->select('id', 'status_publish', 'title', 'text', 'tgl_publish');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($item) {
                    return view('articles.action', compact('item'))->render();
                })
                ->addColumn('tgl_publish', function ($row) {
                    return \Carbon\Carbon::parse($row->tgl_publish)
                        ->locale('id')->isoFormat('dddd, D MMMM YYYY');
                })
                ->addColumn('status_publish', function ($item) {
                    $statusClasses = [
                        'Publish' => 'bg-green-500 text-white',
                        'Draft' => 'bg-gray-500 text-white',
                        'Reject' => 'bg-red-500 text-white',
                        'Perlu Validasi' => 'bg-orange-500 text-white',
                        'spesial' => 'bg-blue-500 text-white',
                    ];
                    $statusClass = $statusClasses[$item->status_publish] ?? 'bg-gray-500 text-white';
                    return '<span class="px-3 py-1 rounded-md text-sm font-medium ' . $statusClass . '">' . $item->status_publish . '</span>';
                })
                ->addColumn('text', function ($item) {
                    return Str::limit(strip_tags($item->text), 150, '...');
                })
                ->rawColumns(['action', 'status_publish'])
                ->make(true);
        }

        return view('articles.list');
    }

    public function showKhusus($slug)
    {
        $article = Articles::where('slug', $slug)->firstOrFail();
        return view('articles.show-khusus', compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
            'text' => 'required',
            'author' => 'required|min:3',
            'file.*' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'caption' => 'required',
            'caption_image' => 'required',
            'tags' => 'required|json',
            'tgl_publish' => 'required',
            'status_publish' => 'required',
            'kategori_konten' => 'required',
            'spesial_kategori' => 'required',
            'super_artikel' => 'nullable',
        ], [
            'title.required' => 'Judul Konten harus diisi.',
            'title.min' => 'Judul minimal 3 karakter.',
            'text.required' => 'Isi Konten harus diisi.',
            'author.required' => 'Penulis Konten  harus diisi.',
            'author.min' => 'Penulis Konten minimal 3 karakter.',
            'file.*.mimes' => 'File harus berupa gambar (jpg, jpeg, png).',
            'file.*.max' => 'Ukuran file maksimal 2MB.',
            'caption.required' => 'Caption Konten harus diisi.',
            'caption_image.required' => 'Caption Image Konten harus diisi.',
            'tgl_publish.required' => 'Tanggal Publish Harus Diisi.',
            'status_publish.required' => 'Pilih Status Publish Konten.',
            'kategori_konten.required' => 'Pilih Kategori Publish Konten.',
            'spesial_kategori.required' => 'Pilih Spesial Kategori Konten.',
            'tags.required' => 'Tags harus diisi.',
            'tags.json' => 'Format tags tidak valid.',
        ]);

        if ($validator->passes()) {
            $article = new Articles();
            $article->title = $request->title;
            $article->slug = Str::slug($request->title);
            $article->text = $request->text;
            $article->author = $request->author;
            $article->caption = $request->caption;
            $article->caption_image = $request->caption_image;
            $article->tags = json_encode($request->tags);
            $article->tgl_publish = $request->tgl_publish;
            $article->status_publish = $request->status_publish;
            $article->kategori_konten = $request->kategori_konten;
            $article->spesial_kategori = $request->spesial_kategori;

            $article->super_artikel = $request->kategori_konten === "khusus" ? $request->text : null;

            // Proses tags
            if ($request->has('tags')) {
                $tags = json_decode($request->tags, true); // Decode JSON dari Tagify
                $article->tags = json_encode(array_column($tags, 'value')); // Encode ke JSON sebelum disimpan
            } else {
                $article->tags = json_encode([]); // Pastikan tetap dalam format JSON
            }

            $article->save();

            // Proses file
            if ($request->hasFile('file')) {
                foreach ($request->file('file') as $file) {
                    $article->addMedia($file)
                        ->toMediaCollection('images', 'public'); // Simpan langsung ke 'public' disk
                }
            }
            return redirect()->route('articles.list')->with('success', 'Artikel berhasil disimpan.');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function edit(string $id)
    {
        $articles = Articles::findOrFail($id);
        $mediaItems = $articles->getMedia('images');
        return view('articles.edit', [
            'articles' => $articles,
            'mediaItems' => $mediaItems
        ]);
    }

    public function update(Request $request, string $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
            'text' => 'required',
            'author' => 'required|min:3',
            'file.*' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'caption' => 'required',
            'caption_image' => 'required',
            'tags' => 'required|json',
            'tgl_publish' => 'required',
            'status_publish' => 'required',
            'kategori_konten' => 'required',
            'spesial_kategori' => 'required',
            'super_artikel' => 'nullable',
        ]);

        if ($validator->passes()) {
            $article = Articles::findOrFail($id);
            $article->title = $request->title;
            $article->slug = Str::slug($request->title);
            $article->text = $request->text;
            $article->author = $request->author;
            $article->caption = $request->caption;
            $article->caption_image = $request->caption_image;
            $article->tags = json_encode($request->tags); // Simpan sebagai JSON
            $article->tgl_publish = $request->tgl_publish;
            $article->status_publish = $request->status_publish;
            $article->kategori_konten = $request->kategori_konten;
            $article->spesial_kategori = $request->spesial_kategori;
            $article->super_artikel = $request->super_artikel;

            if ($request->has('tags')) {
                $tags = json_decode($request->tags, true); // Decode JSON dari Tagify
                $article->tags = json_encode(array_column($tags, 'value')); // Encode ke JSON sebelum disimpan
            } else {
                $article->tags = json_encode([]); // Pastikan tetap dalam format JSON
            }
            $article->save();

            if ($request->hasFile('file')) {
                foreach ($request->file('file') as $file) {
                    $article->addMedia($file)->toMediaCollection('images');
                }
            }

            return redirect()->route('articles.list')->with('success', 'Artikel berhasil diperbarui.');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $article = Articles::find($id);

        if ($article == null) {
            session()->flash('error', 'Article not found');
            return response()->json([
                'status' => false
            ]);
        }
        $article->delete();

        session()->flash('success', 'Artikel Berhasil Dihapus.');
        return response()->json([
            'status' => true
        ]);
    }
}
