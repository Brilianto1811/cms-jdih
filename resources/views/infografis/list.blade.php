<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Infografis') }}
            </h2>
            @can('create infografis')
                <a href="{{ route('infografis.create') }}"
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
                            <th class="px-6 py-4 text-left whitespace-nowrap">Judul</th>
                            <th class="px-6 py-4 text-left whitespace-nowrap">Gambar</th>
                            <th class="px-6 py-4 text-left whitespace-nowrap">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @if ($infografis->isNotEmpty())
                            @foreach ($infografis as $items)
                                <tr class="border-b">
                                    <td class="px-6 py-4 text-left whitespace-nowrap">
                                        {{ $items->judul }}
                                    </td>
                                    <td class="px-6 py-4 text-left whitespace-nowrap">
                                        @if ($items->getFirstMediaUrl('struktur_files'))
                                            <img src="{{ $items->getFirstMediaUrl('struktur_files') }}" alt="Gambar"
                                                class="w-20 h-20 object-cover rounded-md">
                                        @else
                                            <span class="text-gray-500">No Image</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        @can('edit infografis')
                                            <a href="{{ route('infografis.edit', $items->id) }}"
                                                class="bg-slate-700 text-sm rounded-md text-white px-3 py-2 hover:bg-slate-600">Edit</a>
                                        @endcan

                                        @can('delete infografis')
                                            <a href="javascript:void(0)" onclick="deleteInfografis({{ $items->id }})"
                                                class="bg-red-600 text-sm rounded-md text-white px-3 py-2 hover:bg-red-500">Delete</a>
                                        @endcan
                                    </td>

                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            {{ $infografis->links() }}
        </div>
    </div>
    <x-slot name="script">
        <script type="text/javascript">
            window.deleteInfografis = function(id) {
                if (confirm("Are you sure you want to delete?")) {
                    $.ajax({
                        url: '{{ route('infografis.destroy') }}',
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
