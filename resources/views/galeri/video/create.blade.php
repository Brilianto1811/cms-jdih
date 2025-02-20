<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Video / Buat
            </h2>
            <a href="{{ route('video.list') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-2">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative my-3"
                        role="alert">
                        <strong class="font-bold">Terjadi kesalahan!</strong>
                        <ul class="mt-2">
                            @foreach ($errors->all() as $error)
                                <li>- {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('video.store') }}" method="post">
                    @csrf
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="nama" class="text-lg font-medium">Nama</label>
                            <input value="{{ old('nama') }}" name="nama" placeholder="Nama" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('nama')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="tgl_galeri" class="text-lg font-medium">Tanggal</label>
                            <input value="{{ old('tgl_galeri') }}" name="tgl_galeri" placeholder="Tanggal"
                                type="date" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('tgl_galeri')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="url_video" class="text-lg font-medium">Tambah Video Url Youtube</label>
                            <input value="{{ old('url_video') }}" name="url_video"
                                placeholder="Tambah Video Url Youtube" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('url_video')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="deskripsi" class="text-lg font-medium">Deskripsi Video</label>
                            <input value="{{ old('deskripsi') }}" name="deskripsi" placeholder="Deskripsi Video"
                                type="text" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('deskripsi')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6 text-right">
                        <button class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
