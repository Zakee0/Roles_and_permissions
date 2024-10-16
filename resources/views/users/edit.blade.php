<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Users / Edit
            <a href="{{ route('users.index') }}" class="bg-gray-800 text-white d-flex justify-between p-2 rounded">
               Back
            </a>

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('users.update',$user->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                            <input  value="{{ old('name',$user->name) }}" type="text" id="name" name="name" placeholder="Enter your name" class="border rounded-lg w-full p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @error('name')
                                <p class="text-red-400">{{ $message }}</p>
                            @enderror
                            {{-- email  --}}
                            <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                            <input  value="{{ old('email',$user->email) }}" type="text" id="email" name="email" placeholder="Enter your email" class="border rounded-lg w-full p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @error('email')
                                <p class="text-red-400">{{ $message }}</p>
                            @enderror

                            <div class="grid grid-cols-4 mb-3">

                                @if ($roles->isNotEmpty())
                                    @foreach ($roles as $role)
                                        <div class="mt-3 ">
                                            <input  {{ ($hasRoles->contains($role->id)) ? 'checked' : '' }} type="checkbox" id="role-{{ $role }}" class="rounded mr-2" name="role[]" value="{{ $role->name }}">
                                            <label for="role-{{ $role }}">{{ $role->name }}</label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>


                        </div>
                        <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
