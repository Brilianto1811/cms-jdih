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
                    <div class="bg-white border-2 border-solid border-gray-300 p-6 rounded-lg mb-4">
                        <h3 class="text-lg font-semibold mb-4 text-center">Kategori Topik dan Status</h3>
                        <div class="mb-2">
                            <label for="kategori_konten" class="text-lg font-medium">Kategori Konten</label>
                            <select name="kategori_konten" id="kategori_konten"
                                class="border-gray-300 shadow-sm w-full rounded-lg p-2" onchange="toggleReadonly()">
                                <option value="" {{ old('kategori_konten') == '' ? 'selected' : '' }}>Pilih
                                    Kategori
                                </option>
                                <option value="warta" {{ old('kategori_konten') == 'warta' ? 'selected' : '' }}>
                                    Warta
                                </option>
                                <option value="khusus" {{ old('kategori_konten') == 'khusus' ? 'selected' : '' }}>
                                    Kategori Khusus</option>
                            </select>
                        </div>
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label for="spesial_kategori" class="text-lg font-medium">Topik</label>
                                <select id="spesial_kategori" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                                    <option value="" {{ old('spesial_kategori') == '' ? 'selected' : '' }}>Pilih
                                        Topik</option>
                                    <option value="terkini"
                                        {{ old('spesial_kategori') == 'terkini' ? 'selected' : '' }}>
                                        Terkini</option>
                                    <option value="terpopuler"
                                        {{ old('spesial_kategori') == 'terpopuler' ? 'selected' : '' }}>Terpopuler
                                    </option>
                                    <option value="spesial" hidden
                                        {{ old('spesial_kategori') == 'spesial' ? 'selected' : '' }}>
                                        Spesial</option>
                                </select>
                                <input type="hidden" name="spesial_kategori" id="spesial_kategori_hidden"
                                    value="{{ old('spesial_kategori') }}">
                            </div>
                            <div>
                                <label for="status_publish" class="text-lg font-medium">Status Publish</label>
                                <select id="status_publish" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                                    <option value="" {{ old('status_publish') == '' ? 'selected' : '' }}>Pilih
                                        Status Publish</option>
                                    <option value="perlu validasi"
                                        {{ old('status_publish') == 'perlu validasi' ? 'selected' : '' }}>
                                        Perlu Validasi
                                    </option>
                                    <option value="publish" {{ old('status_publish') == 'publish' ? 'selected' : '' }}>
                                        Publish
                                    </option>
                                    <option value="draft" {{ old('status_publish') == 'draft' ? 'selected' : '' }}>
                                        Draft
                                    </option>
                                    <option value="reject" {{ old('status_publish') == 'reject' ? 'selected' : '' }}>
                                        Reject
                                    </option>
                                    <option value="spesial" hidden
                                        {{ old('status_publish') == 'spesial' ? 'selected' : '' }}>
                                        Spesial</option>
                                </select>
                                <input type="hidden" name="status_publish" id="status_publish_hidden"
                                    value="{{ old('status_publish') }}">
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="bg-white border p-6 rounded-lg shadow-lg mb-4">
                            <h3 class="text-lg font-semibold mb-4 text-center">Judul dan Isi Konten</h3>
                            <div class="mb-2">
                                <label for="title" class="text-lg font-medium">Judul</label>
                                <input value="{{ old('title') }}" name="title" placeholder="Judul" type="text"
                                    class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                                @error('title')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="editor" class="text-lg font-medium">Isi Konten</label>
                                <div class="toolbar-container"></div>
                                <div id="editor" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                                    {!! old('text') !!}
                                </div>
                                <input type="hidden" name="text" id="editor-content" value="{{ old('text') }}">
                                @error('text')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="bg-white border p-6 rounded-lg shadow-lg mb-4">
                            <h3 class="text-lg font-semibold mb-4 text-center">Caption dan Penulis</h3>
                            <div class="grid grid-cols-2 gap-6">
                                <div class="col-span-2">
                                    <label for="caption" class="text-lg font-medium">Caption</label>
                                    <textarea name="caption" id="caption" placeholder="Caption" class="border-gray-300 shadow-sm w-full rounded-lg p-2">{{ old('caption') }}</textarea>
                                    @error('caption')
                                        <p class="text-red-400 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="caption_image" class="text-lg font-medium">Sumber</label>
                                    <input value="{{ old('caption_image') }}" name="caption_image" placeholder="Sumber"
                                        type="text" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                                    @error('caption_image')
                                        <p class="text-red-400 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="author" class="text-lg font-medium">Penulis</label>
                                    <input value="{{ old('author') }}" name="author" placeholder="Penulis"
                                        type="text" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                                    @error('author')
                                        <p class="text-red-400 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="bg-white border p-6 rounded-lg shadow-lg mb-4">
                            <h3 class="text-lg font-semibold mb-4 text-center">Tanggal Publish dan Tambah Gambar</h3>

                            <div class="grid grid-cols-1 gap-6">
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
                                    <input value="{{ old('tgl_publish') }}" name="tgl_publish"
                                        placeholder="Tanggal Publish" type="date"
                                        class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                                    @error('tgl_publish')
                                        <p class="text-red-400 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="file" class="text-lg font-medium">Tambah Gambar</label>
                                    <input type="file" name="file[]"
                                        class="border-gray-300 shadow-sm w-full rounded-lg p-2" id="imageInput">
                                    @error('file')
                                        <p class="text-red-400 font-medium">{{ $message }}</p>
                                    @enderror
                                    <div id="imagePreviewContainer" class="mt-3 flex gap-2 flex-wrap"></div>
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

            const imageInput = document.getElementById('imageInput');
            const imagePreviewContainer = document.getElementById('imagePreviewContainer');

            if (imageInput) {
                imageInput.addEventListener('change', function(event) {
                    imagePreviewContainer.innerHTML = ""; // Bersihkan preview sebelumnya
                    const files = event.target.files;

                    if (files.length > 0) {
                        Array.from(files).forEach(file => {
                            if (file.type.startsWith("image/")) {
                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    const imgElement = document.createElement("img");
                                    imgElement.src = e.target.result;
                                    imgElement.classList.add("w-40", "h-40", "object-cover",
                                        "rounded-md", "shadow-md");
                                    imagePreviewContainer.appendChild(imgElement);
                                };
                                reader.readAsDataURL(file);
                            }
                        });
                    }
                });
            }
        });

        document.addEventListener("DOMContentLoaded", function() {
            DecoupledEditor.create(document.querySelector('#editor'))
                .then(editor => {
                    const toolbarContainer = document.querySelector('.toolbar-container');
                    toolbarContainer.appendChild(editor.ui.view.toolbar.element);

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

            let initialContent = $('#editor').ckeditor('code');
            $('#preview').html(initialContent);
        });

        document.addEventListener("DOMContentLoaded", function() {
            let editor = document.getElementById("editor");
            let hiddenInput = document.getElementById("editor-content");

            // Simpan isi editor ke input hidden sebelum form dikirim
            document.querySelector("form").addEventListener("submit", function() {
                hiddenInput.value = editor.innerHTML;
            });
        });

        function toggleReadonly() {
            let kategori = document.getElementById("kategori_konten").value;
            let spesialKategori = document.getElementById("spesial_kategori");
            let statusArticles = document.getElementById("status_publish");
            let caption = document.getElementById("caption");
            let hiddenSpesialKategori = document.getElementById("spesial_kategori_hidden");
            let hiddenStatusArticles = document.getElementById("status_publish_hidden");

            if (kategori === "khusus") {
                // Set value otomatis dan readonly
                spesialKategori.value = "spesial";
                statusArticles.value = "spesial";
                caption.value = "Konten ini termasuk kategori khusus.";

                // Jadikan readonly
                spesialKategori.setAttribute("disabled", "true");
                statusArticles.setAttribute("disabled", "true");
                caption.setAttribute("readonly", "true");

                // Set value hidden agar tetap dikirim ke backend
                hiddenSpesialKategori.value = "spesial";
                hiddenStatusArticles.value = "spesial";
            } else {
                // Aktifkan kembali jika bukan "khusus"
                spesialKategori.removeAttribute("disabled");
                statusArticles.removeAttribute("disabled");
                caption.removeAttribute("readonly");

                // Reset nilai dropdown dan hidden fields jika kategori bukan "khusus"
                spesialKategori.value = "";
                statusArticles.value = "";
                hiddenSpesialKategori.value = "";
                hiddenStatusArticles.value = "";

                // Reset nilai input fields
                caption.value = "";
            }
        }

        document.getElementById("spesial_kategori").addEventListener("change", function() {
            document.getElementById("spesial_kategori_hidden").value = this.value;
        });

        document.getElementById("status_publish").addEventListener("change", function() {
            document.getElementById("status_publish_hidden").value = this.value;
        });

        window.onload = function() {
            toggleReadonly();
        };
    </script>
</x-app-layout>
