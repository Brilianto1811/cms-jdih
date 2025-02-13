<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Users / Edit
            </h2>
            <a href="{{ route('users.list') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-2">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('users.update', $user->id) }}" method="post">
                        @csrf
                        <div>
                            <label class="text-lg font-medium">Name</label>
                            <div class="my-3">
                                <input value="{{ old('name', $user->name) }}" name="name" placeholder="Name"
                                    type="text" class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                @error('name')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <label class="text-lg font-medium">Email</label>
                            <div class="my-3">
                                <input value="{{ old('email', $user->email) }}" name="email" placeholder="Email"
                                    type="email" class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                @error('email')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <label class="text-lg font-medium">Password Baru</label>
                            <div class="my-3">
                                <input name="password" type="password"
                                    placeholder="Kosongkan jika tidak ingin mengubah password"
                                    class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                                @error('password')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <label class="text-lg font-medium">Konfirmasi Password</label>
                            <div class="my-3">
                                <input name="password_confirmation" type="password"
                                    placeholder="Masukkan kembali password baru"
                                    class="border-gray-300 shadow-sm w-1/2 rounded-lg">
                            </div>

                            <label class="text-lg font-medium">Roles</label>
                            <div class="grid grid-cols-4 mb-3">
                                @foreach ($roles as $role)
                                    <div class="mt-3">
                                        <input type="checkbox" id="role-{{ $role->id }}" name="roles[]"
                                            value="{{ $role->id }}" class="rounded" {{-- Perbaikan: Gunakan $user->roles->contains() untuk memastikan checkbox tercentang --}}
                                            {{ (is_array(old('roles')) && in_array($role->id, old('roles'))) || $user->roles->contains($role->id) ? 'checked' : '' }}>
                                        <label for="role-{{ $role->id }}">{{ $role->name }}</label>
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
