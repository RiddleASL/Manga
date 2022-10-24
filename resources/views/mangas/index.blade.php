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
            <a href="{{ route('mangas.create') }}" class="btn-link btn-lg mb-2">+ New Manga</a>
            @forelse ($mangas as $manga)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2x1">
                        <a href="{{ route('mangas.show', $manga->id)}}" class="">{{ $manga->title }}</a>
                    </h2>
                    <p class="author">{{ $manga->author }}</p>
                    <p class="description">
                        {{ Str::limit($manga->description, 400) }}
                    </p>
                    <span class="block mt-4 text-sm opacity-70">{{ $manga->updated_at}}</span>
                </div>
            @empty
                <p>You have no notes yet</p>
            @endforelse
            {{ $mangas->links() }}
        </div>
    </div>
</x-app-layout>