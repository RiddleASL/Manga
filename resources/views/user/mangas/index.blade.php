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
            {{-- Creating a forelse loop with all the database information pulled in through the resource controller manga.index function.
                Displaying it one by one in the layout we create below --}}
            @forelse ($mangas as $manga)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2x1">
                        <a href="{{ route('user.mangas.show', $manga->id)}}" class="">{{ $manga->title }}</a>
                    </h2>
                    <p class="author">Author: {{ $manga->author }} Chapter Count: {{ $manga->chapters }}</p>
                    <p class="publisher">Publisher: {{ $manga->publisher->name }}</p>
                    <img src="{{ asset('storage/images/' . $manga->manga_image) }}" width="400">
                    <p class="description">
                        {{ Str::limit($manga->description, 400) }}
                    </p>    
                    <p>Genre: <?php
                        if($manga->genre == 'sol'){
                            echo('Slice of Life');
                        } else {
                            echo(ucfirst($manga->genre));
                        }
                    ?></p>
                    <span class="block mt-4 text-sm opacity-70">Updated: {{ \Carbon\Carbon::parse($manga->updated_at)->diffForHumans()}}</span>
                </div>
            @empty
                <p>You have no notes yet</p>
            @endforelse
        </div>
    </div>
</x-app-layout>