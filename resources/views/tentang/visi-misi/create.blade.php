<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Visi Misi
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

                <form action="{{ route('visi-misi.store') }}" method="post">
                    @csrf
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="visi" class="text-lg font-medium">Visi</label>
                            <input value="{{ old('visi', $visimisi->visi ?? '') }}" name="visi" placeholder="Visi"
                                type="text" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('visi')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-2">
                            <label for="misi" class="text-lg font-medium">Misi</label>
                            <textarea name="misi" id="summernote" placeholder="Misi" class="border-gray-300 shadow-sm w-full rounded-lg p-2">{{ old('misi', $visimisi->misi ?? '') }}</textarea>
                            @error('misi')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6 text-right">
                        <button class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Submit</button>
                    </div>
                </form>
                <div class="mt-8">
                    <h2 class="text-lg font-semibold">Preview:</h2>
                    <div id="preview" class="p-4 border border-gray-300 bg-white rounded-md">
                        <p class="text-gray-700">Hasil dari input akan tampil di sini...</p>
                    </div>
                </div>
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
            $('#summernote').on('summernote.change', function(_, contents) {
                $('#preview').html(contents);
            });

            // Saat halaman dimuat, isi preview dengan teks lama
            let initialContent = $('#summernote').summernote('code');
            $('#preview').html(initialContent);
        });
    </script>
</x-app-layout>
