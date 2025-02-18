<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Sambutan
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>
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

                <form action="{{ route('sambutan.store') }}" method="post">
                    @csrf
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="nama" class="text-lg font-medium">Nama</label>
                            <input value="{{ old('nama', $sekapursirih->nama ?? '') }}" name="nama"
                                placeholder="Nama" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('nama')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="jabatan" class="text-lg font-medium">Jabatan</label>
                            <input value="{{ old('jabatan', $sekapursirih->jabatan ?? '') }}" name="jabatan"
                                placeholder="Jabatan" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('jabatan')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-2">
                            <label for="sambutan" class="text-lg font-medium">Sambutan</label>
                            <textarea name="sambutan" id="summernote" placeholder="Sambutan"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">{{ old('sambutan', $sekapursirih->sambutan ?? '') }}</textarea>
                            @error('sambutan')
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $('#summernote').summernote({
                placeholder: 'Isi Konten',
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
</x-app-layout>
