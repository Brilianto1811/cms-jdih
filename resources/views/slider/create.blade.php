<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Slider / Buat
            </h2>
            <a href="{{ route('slider.list') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-2">
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

                <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="judul" class="text-lg font-medium">Judul</label>
                            <input value="{{ old('judul') }}" name="judul" placeholder="Judul" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('judul')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="sub_judul" class="text-lg font-medium">Sub Judul</label>
                            <input value="{{ old('sub_judul') }}" name="sub_judul" placeholder="Sub Judul"
                                type="text" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('sub_judul')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="judul_tombol" class="text-lg font-medium">Judul Tombol</label>
                            <input value="{{ old('judul_tombol') }}" name="judul_tombol" placeholder="Judul Tombol"
                                type="text" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('judul_tombol')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="tombol_url" class="text-lg font-medium">Tombol Url</label>
                            <input value="{{ old('tombol_url') }}" name="tombol_url" placeholder="Tombol Url"
                                type="text" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('tombol_url')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="file" class="text-lg font-medium">Upload Image</label>
                            <input type="file" name="file[]" class="border-gray-300 shadow-sm w-full rounded-lg p-2"
                                id="imageInput">
                            @error('file')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                            <img id="imagePreview" class="hidden w-40 h-40 object-cover rounded-md shadow-md mt-3">
                        </div>
                    </div>
                    <div class="mt-6 text-right">
                        <button class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const imageInput = document.getElementById('imageInput');
            const imagePreview = document.getElementById('imagePreview');

            if (imageInput) {
                imageInput.addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            imagePreview.src = e.target.result;
                            imagePreview.classList.remove('hidden');
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }
        });
    </script>
</x-app-layout>
