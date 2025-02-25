@extends('layouts.app-jdih')

@section('title', 'Halaman List Berita')

@section('content')

    <div class="container mx-auto p-6 px-7 md:px-20 mt-40">
        <div class="flex flex-col md:flex-row gap-6">
            <section class="section-berita1 flex-1">
                <h2 class="text-2xl font-bold mb-4 italic">BERITA</h2>
                <div class="grid grid-cols-1 gap-6">
                    @foreach ($articles as $article)
                        <div
                            class="bg-white rounded-lg overflow-hidden transition transform hover:scale-[1.02] hover:shadow-md flex flex-col md:flex-row items-center gap-4">

                            <a href="{{ route('landing.detail-berita', $article->slug) }}"
                                class="w-full h-40 md:w-60 md:h-50 flex-shrink-0">
                                <img src="{{ $article->foto }}" alt="{{ $article->title }}"
                                    class="w-full h-full object-contain rounded-lg">
                            </a>

                            <div class="flex-1 p-4">
                                <a href="{{ route('landing.detail-berita', $article->slug) }}">
                                    <h3 class="font-semibold text-lg text-black hover:text-blue-600">
                                        {{ $article->title }}
                                    </h3>
                                </a>

                                <p class="text-sm text-green-600 font-medium">
                                    {{ \Carbon\Carbon::parse($article->tgl_publish)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                                </p>

                                {{-- <p class="mt-1 text-gray-700">
                                    {!! Str::limit(nl2br(e(strip_tags($article->text))), 150, '...') !!}
                                </p> --}}
                                {{-- <p class="mt-1 text-gray-700">
                                    {{ Str::limit(preg_replace('/[\r\n]+/', ' ', strip_tags($article->text)), 150, '...') }}
                                </p>                                 --}}
                                <p class="mt-1 text-gray-700">
                                    {{ Str::limit(strip_tags($article->text), 150, '...') }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

            <section class="section-tahun w-full md:w-1/3">
                <h2 class="text-2xl font-bold mb-4">TAHUN PRODUK HUKUM</h2>
                <div class="bg-white rounded-lg p-4">
                    <ul class="divide-y divide-gray-200 max-h-[400px] overflow-y-auto">
                        @for ($year = 2024; $year >= 1950; $year--)
                            <li class="flex justify-between py-2">
                                <span>{{ $year }}</span>
                                <span class="font-semibold">{{ rand(20, 150) }}</span>
                            </li>
                        @endfor
                    </ul>
                </div>
            </section>
        </div>
    </div>

@endsection
