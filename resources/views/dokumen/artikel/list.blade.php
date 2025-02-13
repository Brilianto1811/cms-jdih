<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Artikel') }}
            </h2>
            @can('create artikel')
                <a href="{{ route('artikel.create') }}"
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
                            <th class="px-6 py-4 text-left whitespace-nowrap">Aksi</th>
                            <th class="px-6 py-4 text-left whitespace-nowrap">Judul</th>
                            <th class="px-6 py-4 text-left whitespace-nowrap">Subjek</th>
                            <th class="px-6 py-4 text-center whitespace-nowrap">Tahun Terbit</th>
                            <th class="px-6 py-4 text-center whitespace-nowrap">Tempat Terbit</th>
                            <th class="px-6 py-4 text-center whitespace-nowrap">Create At</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @if ($artikel->isNotEmpty())
                            @foreach ($artikel as $items)
                                <tr class="border-b">
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        @can('edit artikel')
                                            <a href="{{ route('artikel.edit', $items->id) }}"
                                                class="bg-slate-700 text-sm rounded-md text-white px-3 py-2 hover:bg-slate-600">Edit</a>
                                        @endcan

                                        @can('delete artikel')
                                            <a href="javascript:void(0)" onclick="deleteArtikel({{ $items->id }})"
                                                class="bg-red-600 text-sm rounded-md text-white px-3 py-2 hover:bg-red-500">Delete</a>
                                        @endcan
                                    </td>
                                    <td class="px-6 py-4 text-left whitespace-nowrap">
                                        {{ $items->judul }}
                                    </td>
                                    <td class="px-6 py-4 text-left whitespace-nowrap">
                                        {{ $items->subjek }}
                                    </td>
                                    <td class="px-6 py-4 text-left whitespace-nowrap">
                                        {{ $items->tahun_terbit }}
                                    </td>
                                    <td class="px-6 py-4 text-left whitespace-nowrap">
                                        {{ $items->tempat_terbit }}
                                    </td>
                                    <td class="px-6 py-4 text-left whitespace-nowrap">
                                        {{ \Carbon\Carbon::parse($items->created_at)->format('d M, Y') }}
                                    </td>

                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            {{ $artikel->links() }}
        </div>
    </div>
    <x-slot name="script">
        <script type="text/javascript">
            window.deleteArtikel = function(id) {
                if (confirm("Are you sure you want to delete?")) {
                    $.ajax({
                        url: '{{ route('artikel.destroy') }}',
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
