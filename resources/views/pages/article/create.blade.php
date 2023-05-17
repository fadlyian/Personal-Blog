<x-app-layout>

    @section('style')
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.0/slimselect.min.css">
    @endsection

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Article - Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="POST" action="{{ route('article.index')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" required>
                            @error('name') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="category_id">Category</label>
                            <select class="form-select" aria-label="Default select example" name="category_id" id="category_id" required>
                                <option selected>Select Category</option>
                                @foreach ($categories as $category)
                                    <option {{ old('category_id') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="tag_ids">Tag</label>
                            <select name="tag_ids[]" id="tag_ids" multiple class="from-control block mt-1 w-full">
                                @foreach($tags as $tag)
                                    <option {{ in_array($tag->id, old('tag_ids') ?? []) ? 'selected' : '' }} value="{{$tag->id}}"> {{$tag->name}}</option>
                                @endforeach
                            </select>
                            @error('tag_ids') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="image">Image</label>
                            <input id="image" class="block mt-1 w-full" type="file" accept="image/*" name="image"  autofocus />
                        </div>

                        <div class="form-group mb-2">
                            <label for="text">Text</label>
                            <textarea name="text" class="my-2 w-full border-gray-300 rounded px-3 py-2 outline-none" cols="30" rows="5"> {{ old('text') }}</textarea>
                            @error('text') <div class="my-1 text-red-500">{{ $message }}</div> @enderror
                            </div>

                        <button type="submit" class="mt-4 btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @section('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.0/slimselect.min.js"></script>
        <script>
            new SlimSelect({
                select: '#tag_ids'
            })
        </script>
    @endsection
</x-app-layout>


