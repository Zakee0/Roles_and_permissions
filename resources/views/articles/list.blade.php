<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
            <a href="{{ route('articles.create') }}" class="bg-gray-800 text-white d-flex justify-between p-2 rounded">
                Create
            </a>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <x-message></x-message>

    {{-- <div class="px-5"> --}}
    <table class="min-w-full bg-gray-800 text-white mx-auto">
        <thead>
            <tr>
                <th class="py-2 px-4 text-left">ID</th>
                <th class="py-2 px-4 text-left">Title</th>
                <th class="py-2 px-4 text-left">Author</th>
                <th class="py-2 px-4 text-left">Created</th>
                <th class="py-2 px-4 text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($articles->isNotEmpty())
            @foreach ($articles as $article)
                <tr>
                    <td class="border-t border-gray-700 py-2 px-4">{{ $loop->index + 1 }}</td>
                    <td class="border-t border-gray-700 py-2 px-4">{{ $article->title }}</td>
                    <td class="border-t border-gray-700 py-2 px-4">{{ $article->author }}</td>
                    {{-- <td class="border-t border-gray-700 py-2 px-4">{{ $permission->created_at }}</td> --}}
                    <td class="border-t border-gray-700 py-2 px-4">
                        {{ \Carbon\Carbon::parse($article->created_at)->format('d M, Y') }}</td>

                    {{-- buttons --}}
                    <td class="border-t border-gray-700 py-2 px-4 text-center">
                        @can('edit articles')
                        <a href="{{ route('articles.edit', $article->id) }}"
                            class="bg-green-700 text-white p-2 rounded hover:bg-green-600 mr-2">
                            Edit
                        </a>
                        @endcan

                        @can('delete articles')
                        <a href="javascript:void( 0);" onclick="deletearticle({{ $article->id }})"
                            class="bg-red-700 text-white p-2 rounded hover:bg-red-600">
                            Delete
                        </a>
                        @endcan

                    </td>
                </tr>
            @endforeach
        @endif



        </tbody>
    </table>
</div>
</div>
</div>
    {{ $articles->links() }}

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("") }}
                </div>
            </div>
        </div>
    </div> --}}
    <x-slot name="script">
        <script type="text/javascript">
            function deletearticle(id) {
                if (confirm('Are you sure you want to delete?')) {
                    $.ajax({
                        url: '{{ route('articles.destroy', '') }}/' + id, // Append id to the URL
                        type: 'DELETE', // 'DELETE' should be a string
                        data: {
                            _token: '{{ csrf_token() }}', // Send the CSRF token
                            id: id
                        },
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Correct headers
                        },
                        success: function(response) {
                            // Redirect to the index route after successful deletion
                            window.location.href = '{{ route('articles.index') }}';
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            alert('An error occurred while deleting the article.');
                        }
                    });
                }
            }
        </script>

    </x-slot>



</x-app-layout>
