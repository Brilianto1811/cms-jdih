<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Monografi Hukum / Buat
            </h2>
            <a href="{{ route('monografi-hukum.list') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-2">
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

                <form action="{{ route('monografi-hukum.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="deskripsi_fisik" class="text-lg font-medium">Deskripsi Fisik</label>
                            <input value="{{ old('deskripsi_fisik') }}" name="deskripsi_fisik"
                                placeholder="Deskripsi Fisik" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('deskripsi_fisik')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="no_induk_buku" class="text-lg font-medium">Nomor Induk Buku</label>
                            <input value="{{ old('no_induk_buku') }}" name="no_induk_buku"
                                placeholder="Nomor Induk Buku" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('no_induk_buku')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="bidang_hukum" class="text-lg font-medium">Bidang Hukum</label>
                            <input value="{{ old('bidang_hukum') }}" name="bidang_hukum" placeholder="Bidang Hukum"
                                type="text" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('bidang_hukum')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="lokasi" class="text-lg font-medium">Lokasi</label>
                            <input value="{{ old('lokasi') }}" name="lokasi" placeholder="Lokasi" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('lokasi')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="bahasa" class="text-lg font-medium">Bahasa</label>
                            <input value="{{ old('bahasa') }}" name="bahasa" placeholder="Bahasa" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('bahasa')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="isbn_issn" class="text-lg font-medium">ISBN/ISSN</label>
                            <input value="{{ old('isbn_issn') }}" name="isbn_issn" placeholder="ISBN/ISSN"
                                type="text" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('isbn_issn')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="subjek" class="text-lg font-medium">Subjek</label>
                            <input value="{{ old('subjek') }}" name="subjek" placeholder="Subjek" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('subjek')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="sumber" class="text-lg font-medium">Sumber</label>
                            <input value="{{ old('sumber') }}" name="sumber" placeholder="Sumber" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('sumber')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="tipe" class="text-lg font-medium">Tipe</label>
                            <input value="{{ old('tipe') }}" name="tipe" placeholder="Tipe" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('tipe')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="tahun_terbit" class="text-lg font-medium">Tahun Terbit</label>
                            <input value="{{ old('tahun_terbit') }}" name="tahun_terbit" placeholder="Tahun Terbit"
                                type="number" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('tahun_terbit')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="penerbit" class="text-lg font-medium">Penerbit</label>
                            <input value="{{ old('penerbit') }}" name="penerbit" placeholder="Penerbit"
                                type="text" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('penerbit')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="tempat_terbit" class="text-lg font-medium">Tempat Terbit</label>
                            <input value="{{ old('tempat_terbit') }}" name="tempat_terbit"
                                placeholder="Tempat Terbit" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('tempat_terbit')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="cetakan_edisi" class="text-lg font-medium">Cetakan/Edisi</label>
                            <input value="{{ old('cetakan_edisi') }}" name="cetakan_edisi"
                                placeholder="Cetakan/Edisi" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('cetakan_edisi')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="nomor_panggil" class="text-lg font-medium">Nomor Panggil</label>
                            <input value="{{ old('nomor_panggil') }}" name="nomor_panggil"
                                placeholder="Nomor Panggil" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('nomor_panggil')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="teu_badan" class="text-lg font-medium">T.E.U Badan/Pengarang</label>
                            <input value="{{ old('teu_badan') }}" name="teu_badan"
                                placeholder="T.E.U Badan/Pengarang" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('teu_badan')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="judul" class="text-lg font-medium">Judul</label>
                            <input value="{{ old('judul') }}" name="judul" placeholder="Judul" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('judul')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="file" class="text-lg font-medium">Upload Image</label>
                            <input type="file" name="file[]"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2" id="imageInput">
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
