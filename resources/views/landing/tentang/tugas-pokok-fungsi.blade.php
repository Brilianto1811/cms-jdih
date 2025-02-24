@extends('layouts.app-jdih')

@section('title', 'Halaman Visi Misi')

@section('content')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
        {{ $article->title }}
    </h2>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="prose dark:prose-invert text-center">
                    <div class="text-left">
                        {!! $article->text !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
