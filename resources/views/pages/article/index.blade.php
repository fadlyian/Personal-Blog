<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Article  ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- {{ __("You're logged in!") }} --}}
                    <button type="button" class="btn btn-success btn-lg" >
                        <a class="link-light link-offset-2 link-underline link-underline-opacity-0" href="/article/create">
                            <span>Tambah Article</span>
                        </a>
                    </button>
                    @if (session('success'))
                    <div class="alert alert-success my-1" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">title</th>
                                <th scope="col">category</th>
                                <th scope="col">tag</th>
                                <th scope="col">image</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>

                        @foreach ($articles->reverse() as $art)
                        <tbody>
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <th>{{ $art->title }}</th>
                                <th>{{ $art->category->name }}</th>
                                <th>
                                    <ul class="list-group">
                                    @foreach ($art->tags as $tag )
                                        <li class="badge bg-primary rounded-pill my-1">{{ $tag->name }}</li>
                                    @endforeach
                                    </ul>
                                </th>
                                <th>{{ $art->image }}</th>
                                <th>
                                    <ul>
                                        <form action="{{ route('article.edit', $art->id) }}" method="GET">
                                            <button class="btn btn-warning">
                                                Edit
                                            </button>
                                        </form>
                                    </ul>
                                    <ul>
                                        <form action="{{ route('article.destroy', $art->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">
                                                Hapus
                                            </button>
                                        </form>
                                    </ul>
                                </th>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


