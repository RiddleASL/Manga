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
        <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
            <h2 class="font-bold text-2x1">
                <a href="{{ route('user.publishers.show', $publisher)}}"><strong>Publisher ID</strong> {{ $publisher->id }} </a>
                </h2>
                <p class="mt-2">
                    <h3><strong>Publisher Name</strong> {{ $publisher->name }}</h3>
                    <h3><strong>Publisher Address</strong> {{ $publisher->address }}</h3>
                </p>
        </div>
        <div class="flex gap-1 pl-2">
            <a href="{{ route('admin.publishers.edit', $publisher) }}" class="btn-link btn-lg mb-2">Edit</a>
            <form action="{{route('admin.publishers.destroy', $publisher)}}" method="post">
                @method('delete')
                @csrf
                <button type="submit" class="btn-danger btn-lg mb-2" onclick="return confirm('Are you sure you want to delete this publisher?')">Delete</button>
            </form>
        </div>
    </div>
</x-app-layout>