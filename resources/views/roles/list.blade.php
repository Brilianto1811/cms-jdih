<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Roles') }}
            </h2>
            @can('create roles')
                <a href="{{ route('roles.create') }}" class="bg-slate-700 text-sm rounded-md text-white px-3 py-2">Create</a>
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
                            <th class="px-6 py-4 text-left whitespace-nowrap" width="60">#</th>
                            <th class="px-6 py-4 text-left whitespace-nowrap">Name</th>
                            <th class="px-6 py-4 text-left whitespace-nowrap">Permissions</th>
                            <th class="px-6 py-4 text-left whitespace-nowrap" width="180">Created</th>
                            <th class="px-6 py-4 text-center whitespace-nowrap" width="180">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @if ($roles->isNotEmpty())
                            @foreach ($roles as $role)
                                <tr class="border-b">
                                    <td class="px-6 py-4 text-left whitespace-nowrap">
                                        {{ $role->id }}
                                    </td>
                                    <td class="px-6 py-4 text-left whitespace-nowrap">
                                        {{ $role->name }}
                                    </td>
                                    <td class="px-6 py-4 text-left">
                                        {{ $role->permissions->pluck('name')->implode(',  ') }}
                                    </td>
                                    <td class="px-6 py-4 text-left whitespace-nowrap">
                                        {{ \Carbon\Carbon::parse($role->created_at)->format('d M, Y') }}
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        @can('edit roles')
                                            <a href="{{ route('roles.edit', $role->id) }}"
                                                class="bg-slate-700 text-sm rounded-md text-white px-3 py-2 hover:bg-slate-600">Edit</a>
                                        @endcan

                                        @can('delete roles')
                                            <a href="javascript:void(0)" onclick="deleteRole({{ $role->id }})"
                                                class="bg-red-600 text-sm rounded-md text-white px-3 py-2 hover:bg-red-500">Delete</a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            {{ $roles->links() }}
        </div>
    </div>
    <x-slot name="script">
        <script type="text/javascript">
            window.deleteRole = function(id) {
                if (confirm("Are you sure you want to delete?")) {
                    $.ajax({
                        url: '{{ route('roles.destroy') }}',
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
