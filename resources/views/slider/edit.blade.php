<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Slider / Edit
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

                <form action="{{ route('slider.update', $slider->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-2 gap-6">
                        <div class="bg-white border p-6 rounded-lg shadow-lg">
                            <h3 class="text-lg font-semibold mb-4 text-center">Judul</h3>
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <label for="judul" class="text-lg font-medium">Judul</label>
                                    <input value="{{ old('judul', $slider->judul) }}" name="judul" placeholder="Judul"
                                        type="text" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                                    @error('judul')
                                        <p class="text-red-400 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="sub_judul" class="text-lg font-medium">Sub Judul</label>
                                    <input value="{{ old('sub_judul', $slider->sub_judul) }}" name="sub_judul"
                                        placeholder="Sub Judul" type="text"
                                        class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                                    @error('sub_judul')
                                        <p class="text-red-400 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="bg-white border p-6 rounded-lg shadow-lg">
                            <h3 class="text-lg font-semibold mb-4 text-center">URL Slider</h3>
                            <div class="grid grid-cols-1 gap-6">
                                <div>
                                    <label for="tombol_url" class="text-lg font-medium">Tombol Url</label>
                                    <input value="{{ old('tombol_url', $slider->tombol_url) }}" name="tombol_url"
                                        placeholder="Tombol Url" type="text"
                                        class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                                    @error('tombol_url')
                                        <p class="text-red-400 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="bg-white border p-6 rounded-lg shadow-lg">
                            <h3 class="text-lg font-semibold mb-4 text-center">Penempatan Slider</h3>
                            <div class="grid grid-cols-1 gap-6">
                                <div>
                                    <label for="penempatan" class="text-lg font-medium">Penempatan</label>
                                    <select name="penempatan" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                                        <option>Pilih Penempatan</option>
                                        <option value="Header"
                                            {{ old('penempatan', $slider->penempatan) == 'Header' ? 'selected' : '' }}>
                                            Header</option>
                                        <option value="Main Utama"
                                            {{ old('penempatan', $slider->penempatan) == 'Main Utama' ? 'selected' : '' }}>
                                            Main Utama</option>
                                        <option value="Main Tengah"
                                            {{ old('penempatan', $slider->penempatan) == 'Main Tengah' ? 'selected' : '' }}>
                                            Main Tengah
                                        </option>
                                        <option value="Main Bawah"
                                            {{ old('penempatan', $slider->penempatan) == 'Main Bawah' ? 'selected' : '' }}>
                                            Main Bawah
                                        </option>
                                        <option value="Sidebar Atas"
                                            {{ old('penempatan', $slider->penempatan) == 'Sidebar Atas' ? 'selected' : '' }}>
                                            Sidebar Atas
                                        </option>
                                        <option value="Sidebar Bawah"
                                            {{ old('penempatan', $slider->penempatan) == 'Sidebar Bawah' ? 'selected' : '' }}>
                                            Sidebar Bawah
                                        </option>
                                        <option value="Sebelum Footer"
                                            {{ old('penempatan', $slider->penempatan) == 'Sebelum Footer' ? 'selected' : '' }}>
                                            Sebelum Footer
                                        </option>
                                        <option value="Footer"
                                            {{ old('penempatan', $slider->penempatan) == 'Footer' ? 'selected' : '' }}>
                                            Footer
                                        </option>
                                    </select>
                                    @error('penempatan')
                                        <p class="text-red-400 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="bg-white border p-6 rounded-lg shadow-lg">
                            <h3 class="text-lg font-semibold mb-4 text-center">Gambar</h3>
                            <div class="grid grid-cols-1 gap-6">
                                <div>
                                    <label for="file" class="text-lg font-medium">Mengunggah Gambar</label>
                                    <input type="file" name="file[]" value="{{ old('file', $slider->file) }}"
                                        class="border-gray-300 shadow-sm w-full rounded-lg p-2" id="imageInput">
                                    @error('file')
                                        <p class="text-red-400 font-medium">{{ $message }}</p>
                                    @enderror
                                    <img id="imagePreview"
                                        class="hidden w-40 h-40 object-cover rounded-md shadow-md mt-3">
                                </div>
                            </div>
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
