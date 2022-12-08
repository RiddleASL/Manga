<x-app-layout>
    <link rel="stylesheet" href="css/main.css">

    <x-slot name="header">
        <div class="tit">
            <h1 class="font-semibold text-x1 text-gray-800 leading-tight title">
                {{ ('All Publishers') }}
            </h1>
        </div>
    </x-slot>

    <div class="py-12">
            {{-- Creating a forelse loop with all the database information pulled in through the resource controller manga.index function.
                Displaying it one by one in the layout we create below --}}
            @forelse ($publishers as $publisher)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2x1">
                        <a href="{{ route('user.publishers.show', $publisher)}}"><strong>Publisher ID</strong> {{ $publisher->id }} </a>
                    </h2>
                    <p class="mt-2">
                        <h3><strong>Publisher Name</strong> {{ $publisher->name }}</h3>
                        <h3><strong>Publisher Address</strong> {{ $publisher->Address }}</h3>
                    </p>
                </div>
            @empty
                <p>No publishers found.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>