<div class="flex justify-center gap-2">
    @can('update slider')
        <a href="{{ route('slider.edit', $items->id) }}"
            class="bg-slate-700 text-sm rounded-md text-white px-3 py-2 hover:bg-slate-600">
            Edit
        </a>
    @endcan
    @can('delete slider')
        <a href="javascript:void(0)" onclick="deleteSlider({{ $items->id }})"
            class="bg-red-600 text-sm rounded-md text-white px-3 py-2 hover:bg-red-500">Delete</a>
    @endcan
</div>
