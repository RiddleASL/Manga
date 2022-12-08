<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mangas') }}
        </h2>
    </x-slot>
    {{-- Everything below create a form allowing for the user input relivant info into the respected fields aswell as upload an image
        Submitting this form pushes it through the resource controller and after vallidation on the required values, gets pushed into the database
        as a new row --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.mangas.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <x-text-input
                        type="text"
                        name="title"
                        field="title"
                        placeholder="Title"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('title')"></x-text-input>

                    <x-text-input
                        type="text"
                        name="author"
                        field="author"
                        placeholder="Author"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('author')"></x-text-input>

                    <x-text-input
                        type="datetime-local"
                        name="created_at"
                        field="created_at"
                        placeholder="Created At"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('created_at')"></x-text-input>

                    <select name="genre" id="genre" field="genre" >
                        <option value="">Select Genre</option>
                        <option value="sol">Slice Of Life</option>
                        <option value="shounen">Shounen</option>
                        <option value="horror">Horror</option>
                        </select>

                    <x-text-input
                        type="number"
                        name="chapters"
                        field="chapters"
                        placeholder="Chapters"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('chapters')"></x-text-input>

                    <x-textarea
                        name="description"
                        rows="10"
                        field="description"
                        placeholder="Start typing here..."
                        class="w-full mt-6"
                        :value="@old('description')"></x-textarea>
                        
                    <x-text-input
                        type="file"
                        name="manga_image"
                        placeholder="Manga Image"
                        class="w-full mt-6"
                        field="manga_image"></x-text-input>

                    <label for="publisher">Publisher</label>
                    <select name="publisher_id">
                        @foreach ($publishers as $publisher)
                            <option value="{{ $publisher->id }}" {{ (old('publisher_id') == $publisher->id) ? "selected" : "" }}>
                                {{ $publisher->name }}
                            </option>
                        @endforeach
                    </select>
                    
                    <br>
                    <x-primary-button class="mt-6">Save Manga</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>