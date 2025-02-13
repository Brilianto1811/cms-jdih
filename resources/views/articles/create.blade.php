<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Artikel / Buat
            </h2>
            <a href="{{ route('articles.list') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-2">
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

                <form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="title" class="text-lg font-medium">Judul</label>
                            <input value="{{ old('title') }}" name="title" placeholder="Judul" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('title')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="author" class="text-lg font-medium">Penulis</label>
                            <input value="{{ old('author') }}" name="author" placeholder="Penulis" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('author')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="caption_image" class="text-lg font-medium">Caption Gambar</label>
                            <input value="{{ old('caption_image') }}" name="caption_image" placeholder="Caption Gambar"
                                type="text" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('caption_image')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="tags" class="text-lg font-medium">Tags/Kata Kunci</label>
                            <input id="tags" name="tags" placeholder="Tags" type="text"
                                class="border-gray-300 shadow-sm w-full rounded-lg advance-options"
                                value="{{ old('tags') }}">
                            @error('tags')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="tgl_publish" class="text-lg font-medium">Tanggal Publish</label>
                            <input value="{{ old('tgl_publish') }}" name="tgl_publish" placeholder="Tanggal Publish"
                                type="date" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            @error('tgl_publish')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="status_publish" class="text-lg font-medium">Status Publish</label>
                            <select name="status_publish" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                                <option value="Publish" {{ old('status_publish') == 'Publish' ? 'selected' : '' }}>
                                    Publish</option>
                                <option value="Draft" {{ old('status_publish') == 'Draft' ? 'selected' : '' }}>Draft
                                </option>
                                <option value="Pending" {{ old('status_publish') == 'Pending' ? 'selected' : '' }}>
                                    Pending</option>
                                <option value="Reject" {{ old('status_publish') == 'Reject' ? 'selected' : '' }}>Reject
                                </option>
                            </select>
                            @error('status_publish')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-2">
                            <label for="text" class="text-lg font-medium">Isi Konten</label>
                            <textarea name="text" id="text-editor" placeholder="Isi Konten"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2">{{ old('text') }}</textarea>
                            @error('text')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-2">
                            <label for="summary" class="text-lg font-medium">Ringkasan/Summary</label>
                            <textarea name="summary" placeholder="Ringkasan/Summary" class="border-gray-300 shadow-sm w-full rounded-lg p-2">{{ old('summary') }}</textarea>
                            @error('summary')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-2">
                            <label for="caption" class="text-lg font-medium">Caption</label>
                            <textarea name="caption" placeholder="Caption" class="border-gray-300 shadow-sm w-full rounded-lg p-2">{{ old('caption') }}</textarea>
                            @error('caption')
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

    <script src="https://cdn.ckeditor.com/ckeditor5/44.1.0/ckeditor5.umd.js"></script>
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

            ClassicEditor
                .create(document.querySelector("#text-editor"), {
                    toolbar: ['undo', 'redo', '|', 'bold', 'italic', '|', 'fontSize', 'fontFamily', 'fontColor',
                        'fontBackgroundColor'
                    ]
                })
                .catch(error => {
                    console.error("CKEditor initialization error:", error);
                });
        });

        document.addEventListener("DOMContentLoaded", function() {
            var input = document.querySelector("#tags");
            var tagify = new Tagify(input, {
                whitelist: [],
                maxTags: 10,
                enforceWhitelist: false,
                delimiters: " ",
                dropdown: {
                    enabled: 0
                }
            });
        });
    </script>
</x-app-layout>
