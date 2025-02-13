<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users') }}
            </h2>
            @can('create users')
                <a href="{{ route('users.create') }}" class="bg-slate-700 text-sm rounded-md text-white px-3 py-2">Create</a>
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
                            <th class="px-6 py-4 text-left whitespace-nowrap">#</th>
                            <th class="px-6 py-4 text-left whitespace-nowrap">Name</th>
                            <th class="px-6 py-4 text-left whitespace-nowrap">Email</th>
                            <th class="px-6 py-4 text-left whitespace-nowrap">Roles</th>
                            <th class="px-6 py-4 text-left whitespace-nowrap">Created</th>
                            <th class="px-6 py-4 text-center whitespace-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @if ($users->isNotEmpty())
                            @foreach ($users as $user)
                                <tr class="border-b">
                                    <td class="px-6 py-4 text-left whitespace-nowrap">
                                        {{ $user->id }}
                                    </td>
                                    <td class="px-6 py-4 text-left whitespace-nowrap">
                                        {{ $user->name }}
                                    </td>
                                    <td class="px-6 py-4 text-left whitespace-nowrap">
                                        {{ $user->email }}
                                    </td>
                                    <td class="px-6 py-4 text-left whitespace-nowrap">
                                        {{ $user->roles->pluck('name')->implode(', ') }}
                                    </td>
                                    <td class="px-6 py-4 text-left whitespace-nowrap">
                                        {{ \Carbon\Carbon::parse($user->created_at)->format('d M, Y') }}
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        @can('edit users')
                                            <a href="{{ route('users.edit', $user->id) }}"
                                                class="bg-slate-700 text-sm rounded-md text-white px-3 py-2 hover:bg-slate-600">Edit</a>
                                        @endcan

                                        @can('delete users')
                                            <a href="javascript:void(0)" onclick="deleteUser({{ $user->id }})"
                                                class="bg-red-600 text-sm rounded-md text-white px-3 py-2 hover:bg-red-500">Delete</a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            {{ $users->links() }}
        </div>
    </div>
    <x-slot name="script">
        <script type="text/javascript">
            window.deleteUser = function(id) {
                if (confirm("Are you sure you want to delete?")) {
                    $.ajax({
                        url: '{{ route('users.destroy') }}',
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
