<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Yurisprudensi / Edit
            </h2>
            <a href="{{ route('yurisprudensi.list') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-2">
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

                <form action="{{ route('yurisprudensi.update', $yurisprudensi->id) }}" method="post">
                    @csrf
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="tipe" class="text-lg font-medium">Tipe</label>
                            <input value="{{ old('tipe', $yurisprudensi->tipe) }}" name="tipe" placeholder="Tipe"
                                type="text" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('tipe')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="judul" class="text-lg font-medium">Judul</label>
                            <input value="{{ old('judul', $yurisprudensi->judul) }}" name="judul" placeholder="Judul"
                                type="text" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('judul')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="teu_badan" class="text-lg font-medium">T.E.U Badan/Pengarang</label>
                            <input value="{{ old('teu_badan', $yurisprudensi->teu_badan) }}" name="teu_badan"
                                placeholder="T.E.U Badan/Pengarang" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('teu_badan')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="nomor_putusan" class="text-lg font-medium">Nomor Putusan</label>
                            <input value="{{ old('nomor_putusan', $yurisprudensi->nomor_putusan) }}"
                                name="nomor_putusan" placeholder="Nomor Putusan" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('nomor_putusan')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="jenis" class="text-lg font-medium">Jenis</label>
                            <input value="{{ old('jenis', $yurisprudensi->jenis) }}" name="jenis" placeholder="Jenis"
                                type="text" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('jenis')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="jenis_perkara" class="text-lg font-medium">Jenis Perkara</label>
                            <input value="{{ old('jenis_perkara', $yurisprudensi->jenis_perkara) }}"
                                name="jenis_perkara" placeholder="Jenis Perkara" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('jenis_perkara')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="singkatan_jenis_peradilan" class="text-lg font-medium">Singkatan Jenis
                                Peradilan</label>
                            <input
                                value="{{ old('singkatan_jenis_peradilan', $yurisprudensi->singkatan_jenis_peradilan) }}"
                                name="singkatan_jenis_peradilan" placeholder="Singkatan Jenis Peradilan" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('singkatan_jenis_peradilan')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="jenis_peradilan" class="text-lg font-medium">Jenis Peradilan</label>
                            <input value="{{ old('jenis_peradilan', $yurisprudensi->jenis_peradilan) }}"
                                name="jenis_peradilan" placeholder="Jenis Peradilan" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('jenis_peradilan')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="singkatan_jenis" class="text-lg font-medium">Singkatan Jenis</label>
                            <input value="{{ old('singkatan_jenis', $yurisprudensi->singkatan_jenis) }}"
                                name="singkatan_jenis" placeholder="Singkatan Jenis" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('singkatan_jenis')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="tempat_peradilan" class="text-lg font-medium">Tempat Peradilan</label>
                            <input value="{{ old('tempat_peradilan', $yurisprudensi->tempat_peradilan) }}"
                                name="tempat_peradilan" placeholder="Tempat Peradilan" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('tempat_peradilan')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="tempat_terbit" class="text-lg font-medium">Tempat Terbit</label>
                            <input value="{{ old('tempat_terbit', $yurisprudensi->tempat_terbit) }}"
                                name="tempat_terbit" placeholder="Tempat Terbit" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('tempat_terbit')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="tanggal_penetapan" class="text-lg font-medium">Tanggal Penetapan</label>
                            <input value="{{ old('tanggal_penetapan', $yurisprudensi->tanggal_penetapan) }}"
                                name="tanggal_penetapan" placeholder="Tanggal Penetapan" type="date"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('tanggal_penetapan')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="tahun_terbit" class="text-lg font-medium">Tahun Terbit</label>
                            <input value="{{ old('tahun_terbit', $yurisprudensi->tahun_terbit) }}"
                                name="tahun_terbit" placeholder="Tahun Terbit" type="number"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('tahun_terbit')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="sumber" class="text-lg font-medium">Sumber</label>
                            <input value="{{ old('sumber', $yurisprudensi->sumber) }}" name="sumber"
                                placeholder="Sumber" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('sumber')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="subjek" class="text-lg font-medium">Subjek</label>
                            <input value="{{ old('subjek', $yurisprudensi->subjek) }}" name="subjek"
                                placeholder="Subjek" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('subjek')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="status" class="text-lg font-medium">Status</label>
                            <input value="{{ old('status', $yurisprudensi->status) }}" name="status"
                                placeholder="Status" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('status')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="bahasa" class="text-lg font-medium">Bahasa</label>
                            <input value="{{ old('bahasa', $yurisprudensi->bahasa) }}" name="bahasa"
                                placeholder="Bahasa" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('bahasa')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="lokasi" class="text-lg font-medium">Lokasi</label>
                            <input value="{{ old('lokasi', $yurisprudensi->lokasi) }}" name="lokasi"
                                placeholder="Lokasi" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('lokasi')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="bidang_hukum" class="text-lg font-medium">Bidang Hukum</label>
                            <input value="{{ old('bidang_hukum', $yurisprudensi->bidang_hukum) }}"
                                name="bidang_hukum" placeholder="Bidang Hukum" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
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
