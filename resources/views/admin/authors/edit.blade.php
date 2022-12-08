<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Author') }}
        </h2>
    </x-slot>
    {{-- Everything below create a form allowing for the user input relivant info into the respected fields aswell as upload an image
        Submitting this form pushes it through the resource controller and after vallidation on the required values, gets pushed into the database
        as a new row --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.authors.update', $author) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <x-text-input
                        type="text"
                        name="name"
                        field="name"
                        placeholder="Name"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('name', $author->name)"></x-text-input>

                    <x-text-input
                        type="text"
                        name="address"
                        field="address"
                        placeholder="Address"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('address', $author->address)"></x-text-input>
                        <x-textarea
                        type="text"
                        name="bio"
                        rows="5"
                        maxlength="255"
                        field="bio"
                        placeholder="Bio"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('bio', $author->bio)"></x-textarea>
                    
                    <br>
                    <x-primary-button class="mt-6">Save Edits to Author</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>