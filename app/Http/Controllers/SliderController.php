<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class SliderController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view slider', only: ['index']),
            new Middleware('permission:edit slider', only: ['edit']),
            new Middleware('permission:create slider', only: ['create']),
            new Middleware('permission:delete slider', only: ['destroy']),
        ];
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $slider = Slider::latest()->select('id', 'judul', 'sub_judul', 'penempatan', 'tombol_url');

            return DataTables::of($slider)
                ->addIndexColumn()
                ->addColumn('action', function ($items) {
                    return view('slider.partials.action', compact('items'))->render();
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('slider.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('slider.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'judul' => 'nullable',
            'sub_judul' => 'nullable',
            // 'judul_tombol' => 'nullable',
            'tombol_url' => 'nullable',
            'penempatan' => 'nullable',
            'file.*' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);
        // dd($request);

        if ($validator->passes()) {
            $slider = new Slider();
            $slider->judul = $request->judul;
            $slider->sub_judul = $request->sub_judul;
            // $slider->judul_tombol = $request->judul_tombol;
            $slider->tombol_url = $request->tombol_url;
            $slider->penempatan = $request->penempatan;

            $slider->save();

            if ($request->hasFile('file')) {
                foreach ($request->file('file') as $file) {
                    $slider->addMedia($file)->toMediaCollection('images');
                }
            }

            return redirect()->route('slider.list')->with('success', 'Slider Berhasil Ditambahkan.');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function edit(string $id)
    {
        $slider = Slider::findOrFail($id);
        $mediaItems = $slider->getMedia('images');
        return view('slider.edit', [
            'slider' => $slider,
            'mediaItems' => $mediaItems
        ]);
    }

    public function update(Request $request, string $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'judul' => 'nullable',
            'sub_judul' => 'nullable',
            // 'judul_tombol' => 'nullable',
            'tombol_url' => 'nullable',
            'penempatan' => 'nullable',
            'file.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        if ($validator->passes()) {
            $slider = Slider::findOrFail($id);
            $slider->judul = $request->judul;
            $slider->sub_judul = $request->sub_judul;
            // $slider->judul_tombol = $request->judul_tombol;
            $slider->tombol_url = $request->tombol_url;
            $slider->penempatan = $request->penempatan;

            $slider->save();

            if ($request->hasFile('file')) {
                foreach ($request->file('file') as $file) {
                    $slider->addMedia($file)->toMediaCollection('images');
                }
            }

            return redirect()->route('slider.list')->with('success', 'Slider berhasil diperbarui.');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $slider = Slider::find($id);

        if ($slider == null) {
            session()->flash('error', 'Slider not found');
            return response()->json([
                'status' => false
            ]);
        }
        $slider->delete();

        session()->flash('success', 'Slider Berhasil Dihapus.');
        return response()->json([
            'status' => true
        ]);
    }
}
