<div class="flex justify-center gap-2">
    @can('update struktur organisasi')
        <a href="{{ route('struktur-organisasi.edit', $items->id) }}"
            class="bg-slate-700 text-sm rounded-md text-white px-3 py-2 hover:bg-slate-600">
            Edit
        </a>
    @endcan
    @can('delete struktur organisasi')
        <a href="javascript:void(0)" onclick="deleteStruktur({{ $items->id }})"
            class="bg-red-600 text-sm rounded-md text-white px-3 py-2 hover:bg-red-500">Delete</a>
    @endcan
</div>
