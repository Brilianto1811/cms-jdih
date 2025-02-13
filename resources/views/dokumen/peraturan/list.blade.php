<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Peraturan') }}
            </h2>
            @can('create peraturan')
                <a href="{{ route('peraturan.create') }}"
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
                            <th class="px-6 py-4 text-center whitespace-nowrap">#</th>
                            <th class="px-6 py-4 text-left whitespace-nowrap">Aksi</th>
                            <th class="px-6 py-4 text-center whitespace-nowrap">No. Peraturan</th>
                            <th class="px-6 py-4 text-center whitespace-nowrap">Tahun</th>
                            <th class="px-6 py-4 text-left whitespace-nowrap">Judul</th>
                            <th class="px-6 py-4 text-left whitespace-nowrap">Subjek</th>
                            <th class="px-6 py-4 text-center whitespace-nowrap">Tanggal Penetapan</th>
                            <th class="px-6 py-4 text-center whitespace-nowrap">Create At</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @if ($peraturan->isNotEmpty())
                            @foreach ($peraturan as $items)
                                <tr class="border-b">
                                    <td class="px-6 py-4 text-left whitespace-nowrap">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        @can('edit peraturan')
                                            <a href="{{ route('peraturan.edit', $items->id) }}"
                                                class="bg-slate-700 text-sm rounded-md text-white px-3 py-2 hover:bg-slate-600">Edit</a>
                                        @endcan

                                        @can('delete peraturan')
                                            <a href="javascript:void(0)" onclick="deletePeraturan({{ $items->id }})"
                                                class="bg-red-600 text-sm rounded-md text-white px-3 py-2 hover:bg-red-500">Delete</a>
                                        @endcan
                                    </td>
                                    <td class="px-6 py-4 text-left whitespace-nowrap">
                                        {{ $items->no_peraturan }}
                                    </td>
                                    <td class="px-6 py-4 text-left whitespace-nowrap">
                                        {{ $items->tahun }}
                                    </td>
                                    <td class="px-6 py-4 text-left whitespace-nowrap">
                                        {{ $items->judul }}
                                    </td>
                                    <td class="px-6 py-4 text-left whitespace-nowrap">
                                        {{ $items->subjek }}
                                    </td>
                                    <td class="px-6 py-4 text-left whitespace-nowrap">
                                        {{ \Carbon\Carbon::parse($items->tgl_penetapan)->format('d M, Y') }}
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
            {{ $peraturan->links() }}
        </div>
    </div>
    <x-slot name="script">
        <script type="text/javascript">
            window.deletePeraturan = function(id) {
                if (confirm("Are you sure you want to delete?")) {
                    $.ajax({
                        url: '{{ route('peraturan.destroy') }}',
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
