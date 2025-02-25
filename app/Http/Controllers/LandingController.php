<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Slider;

class LandingController extends Controller
{
    public function index()
    {
        $articlesTerkini = Articles::where('status_publish', 'publish')->where('spesial_kategori', 'terkini')
            ->latest()
            ->take(4)
            ->with('media')
            ->get();

        $articlesSlider = Articles::where('status_publish', 'publish')
            ->latest()
            ->with('media')
            ->get();

        $slider = Slider::with('media')
            ->where('penempatan', 'Header')
            ->latest()
            ->first();

        return view('welcome', compact('slider', 'articlesTerkini', 'articlesSlider'));
    }


    public function tentang($slug)
    {
        $article = Articles::where('slug', $slug)->firstOrFail();
        $slider = Slider::with('media')
            ->where('penempatan', 'Header')
            ->latest()
            ->first();

        return view('landing.tentang.tentang', compact('article', 'slider'));
    }

    public function berita()
    {
        $articles = Articles::where('status_publish', 'publish')
            ->with('media')
            ->latest()
            ->get();

        $slider = Slider::with('media')
            ->where('penempatan', 'Header')
            ->latest()
            ->first();

        return view('landing.berita.list-berita', compact('articles', 'slider'));
    }

    public function beritaDetail($slug)
    {
        $detailberita = Articles::where('slug', $slug)
            ->with('media')
            ->firstOrFail();

        $articles = Articles::where('status_publish', 'publish')
            ->latest()
            ->get();

        $slider = Slider::with('media')
            ->where('penempatan', 'Header')
            ->latest()
            ->first();

        $latestNews = Articles::where('status_publish', 'publish')
            ->where('id', '!=', $detailberita->id)
            ->latest()
            ->take(4)
            ->with('media')
            ->get();

        return view('landing.berita.detail-berita', compact('articles', 'detailberita', 'slider', 'latestNews'));
    }
}
