<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(session('success'))
                        <h1>{{ session('success') }}</h1>
                    @endif

                    <form method="POST" action="{{ route('upload.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image" required>
                        <button type="submit">Upload</button>
                    </form>
                    <div class="mt-4">
                        <h3>Uploaded Images:</h3>
                        @if($images->count() > 0)
                            <ul style="display: flex; flex-wrap: wrap; list-style: none; padding: 0;">
                                @foreach($images as $image)
                                    <li style="margin: 5px;">
                                        <img src="{{ asset('images/' . $image->filename) }}" alt="{{ $image->filename }}" style="width: 150px;">
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>No images uploaded yet.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
