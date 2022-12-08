<x-app-layout>
    <link rel="stylesheet" href="css/main.css">

    <x-slot name="header">
        <div class="tit">
            <h1 class="font-semibold text-x1 text-gray-800 leading-tight title">
                {{ ('All Authors') }}
            </h1>
        </div>
    </x-slot>

    <div class="py-12">
            <div class="flex gap-32">
                <a href="{{ route('admin.authors.create') }}" class="btn-link btn-lg mb-2">+ New Author</a>
            </div>
            {{-- Creating a forelse loop with all the database information pulled in through the resource controller manga.index function.
                Displaying it one by one in the layout we create below --}}
            @forelse ($authors as $author)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="text-2x1">
                        <a href="{{ route('admin.authors.show', $author)}}"><strong>Author Name</strong> {{ $author->name }} </a>
                    </h2>
                    <p class="mt-2">
                        <h3><strong>Author Address</strong> {{ $author->address }}</h3>
                        <h3><strong>Author Bio</strong> {{ Str::limit($author->bio, 100, '...') }}</h3>
                    </p>
                </div>
            @empty
                <p>No publishers found.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>