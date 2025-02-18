<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Articles / Edit
            </h2>
            <a href="{{ route('articles.list') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-2">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
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

                    <form action="{{ route('articles.update', $articles->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label for="title" class="text-lg font-medium">Judul</label>
                                <input value="{{ old('title', $articles->title) }}" name="title" placeholder="Title"
                                    type="text" class="border-gray-300 shadow-sm w-full rounded-lg">
                                @error('title')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="author" class="text-lg font-medium">Penulis</label>
                                <input value="{{ old('author', $articles->author) }}" name="author"
                                    placeholder="Author" type="text"
                                    class="border-gray-300 shadow-sm w-full rounded-lg">
                                @error('author')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="caption_image" class="text-lg font-medium">Caption Gambar</label>
                                <input value="{{ old('caption_image', $articles->caption_image) }}" name="caption_image"
                                    placeholder="Caption Gambar" type="text"
                                    class="border-gray-300 shadow-sm w-full rounded-lg">
                                @error('caption_image')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- <div>
                                <label for="tags" class="text-lg font-medium">Tags/Kata Kunci</label>
                                <input id="tags" name="tags" placeholder="Tags" type="text"
                                    class="border-gray-300 shadow-sm w-full rounded-lg advance-options"
                                    value="{{ old('tags', implode(',', json_decode($articles->tags))) }}">
                                @error('tags')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div> --}}
                            <div>
                                <label for="tags" class="text-lg font-medium">Tags/Kata Kunci</label>
                                <input id="tags" name="tags" placeholder="Tags" type="text"
                                    class="border-gray-300 shadow-sm w-full rounded-lg advance-options">
                                @error('tags')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="tgl_publish" class="text-lg font-medium">Tanggal Publish</label>
                                <input value="{{ old('tgl_publish', $articles->tgl_publish) }}" name="tgl_publish"
                                    placeholder="Tanggal Publish" type="date"
                                    class="border-gray-300 shadow-sm w-full rounded-lg">
                                @error('tgl_publish')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="status_publish" class="text-lg font-medium">Status Publish</label>
                                <select name="status_publish" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                                    <option value="Publish"
                                        {{ old('status_publish', $articles->status_publish) == 'Publish' ? 'selected' : '' }}>
                                        Publish</option>
                                    <option value="Draft"
                                        {{ old('status_publish', $articles->status_publish) == 'Draft' ? 'selected' : '' }}>
                                        Draft
                                    </option>
                                    <option value="Pending"
                                        {{ old('status_publish', $articles->status_publish) == 'Pending' ? 'selected' : '' }}>
                                        Pending</option>
                                    <option value="Reject"
                                        {{ old('status_publish', $articles->status_publish) == 'Reject' ? 'selected' : '' }}>
                                        Reject
                                    </option>
                                </select>
                                @error('status_publish')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-span-2">
                                <label for="editor" class="text-lg font-medium">Isi Konten</label>
                                <div class="toolbar-container"></div>
                                <div id="editor" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                                    {!! old('text', $articles->text ?? '') !!}
                                </div>
                                <input type="hidden" name="text" id="editor-content"
                                    value="{{ old('text', $articles->text ?? '') }}">
                                @error('text')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-span-2">
                                <label for="summary" class="text-lg font-medium">Ringkasan/Summary</label>
                                <textarea name="summary" placeholder="Content" class="border-gray-300 shadow-sm w-full rounded-lg" id="text"
                                    cols="30" rows="5">{{ old('summary', $articles->summary) }}</textarea>
                                @error('summary')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label for="caption" class="text-lg font-medium">Caption</label>
                                <textarea name="caption" placeholder="Content" class="border-gray-300 shadow-sm w-full rounded-lg" id="text"
                                    cols="30" rows="5">{{ old('caption', $articles->caption) }}</textarea>
                                @error('caption')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="file" class="text-lg font-medium">Upload Image</label>
                                <input type="file" name="file"
                                    class="border-gray-300 shadow-sm w-full rounded-lg" id="imageInput">
                                @error('file')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-span-2">
                                <img id="imagePreview" class="hidden w-40 h-40 object-cover rounded-md shadow-md">
                            </div>
                        </div>

                        <button
                            class="bg-slate-700 hover:bg-slate-600 text-sm rounded-md text-white px-5 py-3 mt-4">Update</button>
                    </form>
                </div>
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

            $('#summernote').summernote({
                placeholder: 'Isi Konten',
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            var input = document.querySelector("#tags");

            var tagsFromLaravel = {!! json_encode(json_decode($articles->tags)) !!} || [];

            var tagify = new Tagify(input, {
                whitelist: [],
                maxTags: 10,
                enforceWhitelist: false,
                delimiters: " ",
                dropdown: {
                    enabled: 0
                }
            });

            tagify.addTags(tagsFromLaravel);
        });

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
