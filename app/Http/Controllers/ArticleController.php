<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;


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
    public function index()
    {
        $articles = Articles::latest()->paginate(10);
        return view('articles.list', [
            'articles' => $articles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
            'text' => 'required',
            'author' => 'required|min:3',
        ]);

        if ($validator->passes()) {
            $article = new Articles();
            $article->title = $request->title;
            $article->text = $request->text;
            $article->author = $request->author;
            $article->save();

            return redirect()->route('articles.list')->with('success', 'Article added successfully.');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $articles = Articles::findOrFail($id);
        return view('articles.edit', [
            'articles' => $articles
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $articles = Articles::findOrFail($id);

        // Validasi input tanpa unique
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
            'text' => 'required',
            'author' => 'required|min:3',
        ], [
            'title.required' => 'Judul harus diisi.',
            'title.min' => 'Judul minimal 3 karakter.',
            'text.required' => 'Deskripsi harus diisi.',
            'author.required' => 'Penulis harus diisi.',
            'author.min' => 'Nama penulis minimal 3 karakter.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('articles.edit', $id)->withErrors($validator)->withInput();
        }

        // Update data
        $articles->title = $request->title;
        $articles->text = $request->text;
        $articles->author = $request->author;
        $articles->save();

        // Redirect dengan pesan sukses
        return redirect()->route('articles.list')->with('success', 'Artikel berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
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

        session()->flash('success', 'Article berhasil dihapus');
        return response()->json([
            'status' => true
        ]);
    }
}
