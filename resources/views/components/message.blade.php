@if (Session::has('success'))
    <div class="bg-green-500 p-4 text-white">
        {{ Session::get('success') }}
    </div>
@endif

@error(Session::has('error'))
    <div class="bg-red-500 p-4 text-white">
        {{ Session::get('error') }}
    </div>
@enderror
