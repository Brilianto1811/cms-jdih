<div class="flex justify-center gap-2">
    @can('update video')
        <a href="{{ route('video.edit', $item->id) }}"
            class="bg-slate-700 text-sm rounded-md text-white px-3 py-2 hover:bg-slate-600">
            Edit
        </a>
    @endcan
    @can('delete video')
        <a href="javascript:void(0)" onclick="deleteVideo({{ $item->id }})"
            class="bg-red-600 text-sm rounded-md text-white px-3 py-2 hover:bg-red-500">Delete</a>
    @endcan
</div>
