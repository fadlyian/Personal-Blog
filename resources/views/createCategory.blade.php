<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Category  ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="POST" action="{{ isset($category) ? route('updateCategory', $category->id) : route('addCategory') }}" enctype="multipart/form-data">
                        @csrf
                        @if (isset($category))
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <label for="name">Name Category</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ isset($category) ? $category->name : "" }}" placeholder="Enter name">
                        </div>

                        <button type="submit" class="mt-4 btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>


