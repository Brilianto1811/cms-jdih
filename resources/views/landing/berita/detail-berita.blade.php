@extends('layouts.app-jdih')

@section('title', 'Halaman Detail Berita')

@section('content')
    <div class="container mx-auto p-6 px-7 md:px-20 mt-20">
        <div class="flex flex-col md:flex-row gap-6">
            <section class="section-berita1 flex-1">
                <div class="grid grid-cols-1 gap-6">
                    <div
                        class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 flex flex-col md:flex-row gap-6">
                        <div class="prose dark:prose-invert text-center w-full">
                            <!-- Title dimasukkan ke dalam card -->
                            <h2
                                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center mb-4">
                                {{ $detailberita->title }}
                            </h2>

                            @if ($detailberita->foto)
                                <div class="mb-4">
                                    <img src="{{ $detailberita->foto }}" alt="{{ $detailberita->title }}"
                                        class="w-full h-auto object-contain rounded-lg shadow-lg">
                                </div>
                            @endif

                            <div class="text-left">
                                {!! $detailberita->text !!}
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section-tahun w-full md:w-1/3">
                <div>
                    <h2 class="text-sm md:text-2xl font-bold mb-4">BERITA TERKINI</h2>
                    <div class="space-y-4">
                        @foreach ($latestNews as $news)
                            <a href="{{ route('landing.detail-berita', $news->slug) }}" class="terkini flex gap-4">
                                <img src="{{ $news->foto }}" alt="{{ $news->title }}"
                                    class="h-20 w-28 rounded-md object-cover">
                                <p class="hover:text-blue-700 line-clamp-3">
                                    {{ $news->title }}
                                </p>
                            </a>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
