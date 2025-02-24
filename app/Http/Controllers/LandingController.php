<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Slider;

class LandingController extends Controller
{
    public function index()
    {
        $slider = Slider::with('media')
            ->where('penempatan', 'Header')
            ->latest()
            ->first();

        return view('welcome', compact('slider'));
    }

    public function tentang($slug)
    {
        $article = Articles::where('slug', $slug)->latest()->first();

        if (!$article) {
            return abort(404, 'Data tidak ditemukan');
        }

        $view = match ($slug) {
            'sambutan' => 'landing.tentang.sambutan',
            'visi-dan-misi' => 'landing.tentang.visi-misi',
            'sejarah' => 'landing.tentang.sejarah',
            'tugas-pokok-dan-fungsi' => 'landing.tentang.tugas-pokok-fungsi',
            'dasar-hukum' => 'landing.tentang.dasar-hukum',
            default => abort(404, 'Halaman tidak ditemukan')
        };

        return view($view, compact('article'));
    }
}
