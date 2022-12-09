
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Author') }}
        </h2>
    </x-slot>

    {{-- Similar to the create, everything below create a form that pulls in the info from the database into the respected field, knowing so
        through the variable we pushed in the previous page (show). Once all fields are filled, it goes through the resrouce controller,
        check if all required fields are met and updates the information within the database --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.mangas.update', $manga) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <x-text-input type="text" name="title" field="title" placeholder="Title" class="w-full"
                        autocomplete="off" :value="@old('title', $manga->title)"></x-text-input>

                    <x-text-input type="datetime-local" name="updated_at" field="updated_at" class="w-full"
                        autocomplete="off" :value="@old('updated_at', $manga->updated_at)"></x-text-input>

                    <select name="genre" id="genre" field="genre">
                        <option value="" {{ $manga->genre === '' ? 'Selected' : '' }}>Select Genre</option>
                        <option value="sol" {{ $manga->genre === 'sol' ? 'Selected' : '' }}>Slice Of Life</option>
                        <option value="shounen" {{ $manga->genre === 'shounen' ? 'Selected' : '' }}>Shounen</option>
                        <option value="horror" {{ $manga->genre === 'horror' ? 'Selected' : '' }}>Horror</option>
                    </select>

                    <x-text-input type="number" name="chapters" field="chapters" class="w-full" autocomplete="off"
                        :value="@old('chapters', $manga->chapters)"></x-text-input>

                    <x-textarea name="description" rows="10" field="description" placeholder="Start typing here..."
                        class="w-full mt-6" :value="@old('description', $manga->description)"></x-textarea>

                    <x-text-input type="file" name="manga_image" placeholder="Manga Image" class="w-full mt-6"
                        field="manga_image"></x-text-input>

                    <select name="publisher_id">
                        @foreach ($publishers as $publisher)
                            <option value="{{ $publisher->id }}"
                                {{ old('publisher_id', $publisher->id) == $manga->publisher_id ? 'selected' : '' }}>
                                {{ $publisher->name }}
                            </option>
                        @endforeach
                    </select>
                    <br>

                    <label for="author">Author</label>
                    @foreach ($authors as $author)
                        <input type="checkbox" name="authors[]" 
                        value="{{ $author->id }}" 
                            @foreach ($author_manga as $check)
                                @if ($check->author_id == $author->id && $check->manga_id == $manga->id)
                                    {{ "checked" }}
                                @endif
                            @endforeach
                        >
                        {{ $author->name }}
                    @endforeach
                    <br>
                    {{-- <input type="checkbox" name="authors[]" value="{{ $author->id }} {{ (old('author_id') == $author->id) ? "checked" : "" }}"> --}}
                    {{-- {{ $author->name }} --}}
                    <br>

                    <x-primary-button class="mt-6">Save Edit</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
