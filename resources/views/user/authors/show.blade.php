<x-app-layout>
    <link rel="stylesheet" href="css/main.css">

    <x-slot name="header">
        <div class="tit">
            <h1 class="font-semibold text-x1 text-gray-800 leading-tight title">
                {{ 'Author' }}
            </h1>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
            <h2 class="text-2x1">
                <p><strong>Author Name</strong> {{ $author->name }}</p>
            </h2>
            <p class="mt-2">
            <h3><strong>Author Address</strong> {{ $author->address }}</h3>
            <h3><strong>Author Bio</strong><br> <span class="font-italic">{{ $author->bio }}</span></h3>
            </p>
        </div>

        <strong>Mangas Writen by {{ $author->name }}</strong>
        @foreach ($author_manga as $check)
            @foreach ($mangas as $manga)
                @if ($check->author_id == $author->id && $check->manga_id == $manga->id)
                    <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                        <a href="{{ route('user.mangas.show', $manga->id) }}"><strong>Title:</strong>
                            {{ $manga->title }}</a>
                        <img src="{{ asset('storage/images/' . $manga->manga_image) }}" width="400">
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>
    </div>
</x-app-layout>
