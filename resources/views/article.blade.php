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
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">title</th>
                                <th scope="col">text</th>
                                <th scope="col">image</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>

                        @foreach ($articles as $art)
                        <tbody>
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <th>{{ $art->title }}</th>
                                <th>{{ $art->text }}</th>
                                <th>{{ $art->image }}</th>
                                <th>
                                    <ul>
                                        <button class="btn btn-warning">
                                            <a href="" class="link-light link-underline link-underline-opacity-0">edit</a>
                                        </button>
                                    </ul>
                                    <ul>
                                        <form action="{{ route('articleDestroy', $art->id) }}" method="POST">
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


