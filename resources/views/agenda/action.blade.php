<div class="flex justify-center gap-2">
    @can('update agenda')
        <a href="{{ route('agenda.edit', $item->id) }}"
            class="bg-slate-700 text-sm rounded-md text-white px-3 py-2 hover:bg-slate-600">
            Edit
        </a>
    @endcan
    @can('delete agenda')
        <a href="javascript:void(0)" onclick="deleteAgenda({{ $item->id }})"
            class="bg-red-600 text-sm rounded-md text-white px-3 py-2 hover:bg-red-500">Delete</a>
    @endcan
</div>
