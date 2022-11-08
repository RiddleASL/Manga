<x-app-layout>
    <link rel="stylesheet" href="css/main.css">
    <x-slot name="header">
        <div class="tit">
            <h1 class="font-semibold text-x1 text-gray-800 leading-tight title">
                {{ ('Mangas') }}
            </h1>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            {{-- Below here, everything is pulled in from the database and displayed in its relavant area. Deciding what to pull in based on the
                Manga pressed in the previous page (index) --}}
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <h1 class="font-bold text-lg">
                        {{ $manga->title }}
                    </h1>
                    <p class="author italic font-sm">Author: {{ $manga->author }} Chapter Count: {{ $manga->chapters }}</p>
                    <img src="{{ asset('storage/images/' . $manga->manga_image) }}" width="400">
                    <p class="description">
                        {{ Str::limit($manga->description, 400) }}
                    </p>
                    <br>
                    <p class="font-bold">Genre: {{ $manga->genre }}</p>
                    <span class="block mt-4 text-sm opacity-70">Updated: {{ $manga->updated_at->diffForHumans()}}</span>
                </div> 

                {{-- Below, Buttons for the Edit and Delete funtions are set up to call within the resource controller
                    Delete button comes up with a prompt before, confirming the user wishes to delete (error prevention) --}}
            <a href="{{ route('mangas.edit', $manga) }}" class="btn-link btn-lg mb-2">Edit</a>
            <form action="{{route('mangas.destroy', $manga)}}" method="post">
            @method('delete')
            @csrf
            <button type="submit" class="btn-danger btn-lg mb-2" onclick="return confirm('Are you sure you want to delete this manga?')">Delete</button>
            </form>
        </div>
    </div>
</x-app-layout>