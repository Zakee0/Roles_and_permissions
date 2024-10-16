<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Permission / Create
            <a href="{{ route('permission.index') }}" class="bg-gray-800 text-white d-flex justify-between p-2 rounded">
               Back
            </a>
            
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('permission.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                            <input value="{{ old('name') }}" type="text" id="name" name="name" placeholder="Enter your name" class="border rounded-lg w-full p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @error('name')
                                <p class="text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
