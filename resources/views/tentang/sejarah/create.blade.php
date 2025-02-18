<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Sejarah
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

                <form action="{{ route('sejarah.store') }}" method="post">
                    @csrf
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="judul" class="text-lg font-medium">Judul</label>
                            <input value="{{ old('judul', $sejarah->judul ?? '') }}" name="judul" placeholder="Judul"
                                type="text" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('judul')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-2">
                            <label for="editor" class="text-lg font-medium">Isi Sejarah</label>
                            <div class="toolbar-container"></div>
                            <div id="editor" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                                {!! old('text', $sejarah->text ?? '') !!}
                            </div>
                            <input type="hidden" name="text" id="editor-content"
                                value="{{ old('text', $sejarah->text ?? '') }}">
                            @error('text')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6 text-right">
                        <button class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Submit</button>
                    </div>
                </form>
                {{-- <div class="mt-8">
                    <h2 class="text-lg font-semibold">Preview:</h2>
                    <div id="preview" class="p-4 border border-gray-300 bg-white rounded-md">
                        <p class="text-gray-700">Hasil dari input akan tampil di sini...</p>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            DecoupledEditor.create(document.querySelector('#editor'))
                .then(editor => {
                    const toolbarContainer = document.querySelector('.toolbar-container');
                    toolbarContainer.appendChild(editor.ui.view.toolbar.element);

                    // Simpan isi editor ke input hidden sebelum submit form
                    editor.model.document.on('change:data', () => {
                        document.querySelector("#editor-content").value = editor.getData();
                    });

                    window.editor = editor;
                })
                .catch(error => {
                    console.error('Error initializing CKEditor:', error);
                });

            $('#editor').on('editor.change', function(_, contents) {
                $('#preview').html(contents);
            });

            // Saat halaman dimuat, isi preview dengan teks lama
            let initialContent = $('#editor').ckeditor('code');
            $('#preview').html(initialContent);
        });
    </script>
</x-app-layout>
