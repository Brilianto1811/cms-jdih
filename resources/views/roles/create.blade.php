<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Roles / Create
            </h2>
            <a href="{{ route('permissions.index') }}"
                class="bg-slate-700 text-sm rounded-md text-white px-5 py-2">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('roles.store') }}" method="post">
                        @csrf

                        <div>
                            <label for="" class="text-lg font-medium">Nama</label>
                            <div class="my-3">
                                <input value="{{ old('name') }}" name="name" placeholder="Masukkan Nama"
                                    type="text" class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                @error('name')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Menampilkan checkbox dalam 3 kolom --}}
                            <div class="grid grid-cols-3 gap-4 mb-3">
                                @foreach ($permissions as $permission)
                                    <div class="flex items-center space-x-2">
                                        <input type="checkbox" id="permission-{{ $permission->id }}" class="rounded"
                                            name="permission[]" value="{{ $permission->name }}">
                                        <label for="permission-{{ $permission->id }}">{{ $permission->name }}</label>
                                    </div>
                                @endforeach
                            </div>

                            <button class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
