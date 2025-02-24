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
        $article = Articles::where('slug', $slug)->firstOrFail();

        return view('landing.tentang.tentang', compact('article'));
    }
}
