<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Articles') }}
            </h2>
            @can('create articles')
                <a href="{{ route('articles.create') }}"
                    class="bg-slate-700 text-sm rounded-md text-white px-3 py-2">Create</a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>
            <div class="overflow-x-auto max-w-full">
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-500 text-white">
                        <tr class="border-b">
                            <th class="px-6 py-4 text-left">#</th>
                            <th class="px-6 py-4 text-center whitespace-nowrap w-40">Action</th>
                            <th class="px-6 py-4 text-left whitespace-nowrap">Status Publish</th>
                            {{-- <th class="px-6 py-4 text-left">Image</th> --}}
                            <th class="px-6 py-4 text-left whitespace-nowrap">Judul Artikel</th>
                            <th class="px-6 py-4 text-left whitespace-nowrap">Isi Konten</th>
                            <th class="px-6 py-4 text-left whitespace-nowrap">Penulis</th>
                            <th class="px-6 py-4 text-left whitespace-nowrap">Ringkasan/Summary</th>
                            <th class="px-6 py-4 text-left whitespace-nowrap">Caption</th>
                            <th class="px-6 py-4 text-left whitespace-nowrap">Caption Gambar</th>
                            <th class="px-6 py-4 text-left whitespace-nowrap">Tags</th>
                            <th class="px-6 py-4 text-left whitespace-nowrap">Tanggal Publish</th>
                            <th class="px-6 py-4 text-left whitespace-nowrap">Created</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @if ($articles->isNotEmpty())
                            @foreach ($articles as $article)
                                <tr class="border-b">
                                    <td class="px-6 py-4 text-left">{{ $article->id }}</td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        @can('edit articles')
                                            <a href="{{ route('articles.edit', $article->id) }}"
                                                class="bg-slate-700 text-sm rounded-md text-white px-3 py-2 hover:bg-slate-600">Edit</a>
                                        @endcan

                                        @can('delete articles')
                                            <a href="javascript:void(0)" onclick="deleteArticle({{ $article->id }})"
                                                class="bg-red-600 text-sm rounded-md text-white px-3 py-2 hover:bg-red-500">Delete</a>
                                        @endcan
                                    </td>
                                    <td class="px-6 py-4 text-left whitespace-nowrap">
                                        @php
                                            $statusClasses = [
                                                'Publish' => 'bg-green-500 text-white',
                                                'Draft' => 'bg-gray-500 text-white',
                                                'Pending' => 'bg-orange-500 text-white',
                                                'Reject' => 'bg-red-500 text-white',
                                            ];
                                            $statusClass =
                                                $statusClasses[$article->status_publish] ?? 'bg-gray-500 text-white';
                                        @endphp
                                        <span class="px-3 py-1 rounded-md text-sm font-medium {{ $statusClass }}">
                                            {{ $article->status_publish }}
                                        </span>
                                    </td>
                                    {{-- <td class="px-6 py-4 text-left">
                                        @if ($article->getFirstMediaUrl('articles'))
                                            <img src="{{ $article->getFirstMediaUrl('articles') }}" alt="Article Image"
                                                class="w-16 h-16 rounded-md">
                                        @else
                                            <span class="text-gray-400">No Image</span>
                                        @endif
                                    </td> --}}
                                    <td class="px-6 py-4 text-left">{{ $article->title }}</td>
                                    <td class="px-6 py-4 text-left">
                                        {{ Str::limit($article->text, 50) }}</td>
                                    <td class="px-6 py-4 text-left whitespace-nowrap">{{ $article->author }}</td>
                                    <td class="px-6 py-4 text-left">{{ $article->summary }}</td>
                                    <td class="px-6 py-4 text-left">{{ $article->caption }}</td>
                                    <td class="px-6 py-4 text-left whitespace-nowrap">{{ $article->caption_image }}
                                    </td>
                                    <td class="px-6 py-4 text-left whitespace-nowrap">
                                        @php
                                            $tags = json_decode($article->tags, true); // Decode JSON ke array
                                            if (is_string($tags)) {
                                                $tags = json_decode($tags, true); // Decode ulang jika masih string
                                            }
                                        @endphp

                                        @if (is_array($tags))
                                            {{ implode(', ', array_map(fn($tag) => $tag['value'] ?? $tag, $tags)) }}
                                        @else
                                            {{ $article->tags }} <!-- Jika tidak berbentuk JSON, tampilkan langsung -->
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-left whitespace-nowrap">{{ $article->tgl_publish }}</td>
                                    <td class="px-6 py-4 text-left whitespace-nowrap">
                                        {{ \Carbon\Carbon::parse($article->created_at)->format('d M, Y') }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            {{ $articles->links() }}
        </div>
    </div>
    <x-slot name="script">
        <script type="text/javascript">
            window.deleteArticle = function(id) {
                if (confirm("Are you sure you want to delete?")) {
                    $.ajax({
                        url: '{{ route('articles.destroy') }}',
                        type: 'DELETE',
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}' // Tambahkan token CSRF di sini
                        },
                        dataType: "json",
                        success: function(response) {
                            window.location.reload();
                        },
                        error: function(xhr) {
                            alert("Error: " + xhr.responseText);
                        }
                    });
                }
            }
        </script>
    </x-slot>
</x-app-layout>
