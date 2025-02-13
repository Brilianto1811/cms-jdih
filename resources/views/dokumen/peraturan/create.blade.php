<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Peraturan / Buat
            </h2>
            <a href="{{ route('peraturan.list') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-2">
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

                <form action="{{ route('peraturan.store') }}" method="post">
                    @csrf
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="tipe_dokumen" class="text-lg font-medium">Tipe Dokumen</label>
                            <input value="{{ old('tipe_dokumen') }}" name="tipe_dokumen" placeholder="Tipe Dokumen"
                                type="text" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('tipe_dokumen')
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
                            <label for="teu_badan" class="text-lg font-medium">Pengarang / Badan</label>
                            <input value="{{ old('teu_badan') }}" name="teu_badan" placeholder="Pengarang / Badan"
                                type="text" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('teu_badan')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="no_peraturan" class="text-lg font-medium">Nomor Peraturan</label>
                            <input value="{{ old('no_peraturan') }}" name="no_peraturan" placeholder="Nomor Peraturan"
                                type="number" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('no_peraturan')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="tahun" class="text-lg font-medium">Tahun</label>
                            <input value="{{ old('tahun') }}" name="tahun" placeholder="Tahun" type="number"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('tahun')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="jenis" class="text-lg font-medium">Jenis</label>
                            <input value="{{ old('jenis') }}" name="jenis" placeholder="Jenis" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('jenis')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="singkatan_jenis" class="text-lg font-medium">Singkatan Jenis</label>
                            <input value="{{ old('singkatan_jenis') }}" name="singkatan_jenis"
                                placeholder="Singkatan Jenis" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('singkatan_jenis')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="tempat_penetapan" class="text-lg font-medium">Tempat Penetapan</label>
                            <input value="{{ old('tempat_penetapan') }}" name="tempat_penetapan"
                                placeholder="Tempat Penetapan" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('tempat_penetapan')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="tgl_penetapan" class="text-lg font-medium">Tanggal Penetapan</label>
                            <input value="{{ old('tgl_penetapan') }}" name="tgl_penetapan"
                                placeholder="Tanggal Penetapan" type="date"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('tgl_penetapan')
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
                            <label for="subjek" class="text-lg font-medium">Subjek</label>
                            <input value="{{ old('subjek') }}" name="subjek" placeholder="Subjek" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('subjek')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="status_peraturan" class="text-lg font-medium">Status Peraturan</label>
                            <select name="status_peraturan" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                                <option value="Berlaku" {{ old('status_peraturan') == 'Berlaku' ? 'selected' : '' }}>
                                    Berlaku</option>
                                <option value="Tidak Berlaku"
                                    {{ old('status_peraturan') == 'Tidak Berlaku' ? 'selected' : '' }}>Tidak Berlaku
                                </option>
                            </select>
                            @error('status_peraturan')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="keterangan_status" class="text-lg font-medium">Keterangan Status</label>
                            <textarea name="keterangan_status" placeholder="Keterangan Status"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">{{ old('keterangan_status') }}</textarea>
                            @error('keterangan_status')
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
                            <label for="lokasi" class="text-lg font-medium">Lokasi</label>
                            <input value="{{ old('lokasi') }}" name="lokasi" placeholder="Lokasi" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('lokasi')
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
                    </div>

                    <div class="mt-6 text-right">
                        <button class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
