<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('mangas.store') }}" method="post">
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
                        class="w-full"
                        autocomplete="off"
                        :value="@old('created_at')"></x-text-input>

                    <select name="genre" id="genre" field="genre" palceholder="Select">
                        <option value="">Select Genre</option>
                        <option value="sof">Slice Of Life</option>
                        <option value="shounen">Shounen</option>
                        <option value="horror">Horror</option>
                        </select>

                    <x-text-input
                        type="number"
                        name="chapters"
                        field="chapters"
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
                        

                    <x-primary-button class="mt-6">Save Note</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>