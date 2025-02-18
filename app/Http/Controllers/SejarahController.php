<?php

namespace App\Http\Controllers;

use App\Models\Sejarah;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class SejarahController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view sejarah', only: ['index']),
            new Middleware('permission:edit sejarah', only: ['edit', 'update']),
            new Middleware('permission:create sejarah', only: ['create', 'store']),
            new Middleware('permission:delete sejarah', only: ['destroy']),
        ];
    }

    public function create()
    {
        $sejarah = Sejarah::first();
        return view('tentang.sejarah.create', compact('sejarah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'text' => 'required|string',
        ]);

        $sejarah = Sejarah::first();

        if ($sejarah) {
            $sejarah->update([
                'judul' => $request->judul,
                'text' => $request->text
            ]);
        } else {
            Sejarah::create([
                'judul' => $request->judul,
                'text' => $request->text
            ]);
        }

        return redirect()->back()->with('success', 'Sejarah berhasil disimpan.');
    }
}
