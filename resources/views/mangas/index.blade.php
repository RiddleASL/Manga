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
            <div class="flex gap-32">
                <a href="{{ route('mangas.create') }}" class="btn-link btn-lg mb-2">+ New Manga</a>
                <form action="" method="post">
                    @csrf
                    <x-text-input
                    type="text"
                    name="search"
                    field="search"
                    placeholder="Search"
                    class=""
                    autocomplete="off"
                        ></x-text-input>
                        <button type="submit" class="btn-link btn-lg mb-2">Search</button>
                </form>
            </div>
            @forelse ($mangas as $manga)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2x1">
                        <a href="{{ route('mangas.show', $manga->id)}}" class="">{{ $manga->title }}</a>
                    </h2>
                    <p class="author">Author: {{ $manga->author }} Chapter Count: {{ $manga->chapters }}</p>
                    <img src="{{ asset('storage/images/' . $manga->manga_image) }}" width="400">
                    <p class="description">
                        {{ Str::limit($manga->description, 400) }}
                    </p>    
                    <p>{{ $manga->genre }}</p>
                    <span class="block mt-4 text-sm opacity-70">Updated: {{ $manga->updated_at->diffForHumans()}}</span>
                </div>
            @empty
                <p>You have no notes yet</p>
            @endforelse
            {{ $mangas->links() }}
        </div>
    </div>
</x-app-layout>