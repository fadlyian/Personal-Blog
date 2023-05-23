@extends('layouts.main')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto flex justify-center sm:px-6 lg:px-8">
            <div class="bg-white w-full sm:w-3/5 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if($article->image)
                        <div class="flex justify-center items-center">
                            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->category->name }}" class="img-fluid">
                            <br>
                        </div>
                    @else
                        <img src="https://source.unsplash.com/1200x400?{{ $article->category->name }}" alt="{{ $article->category->name }}" class="img-fluid">
                    @endif
                  <h1 class="text-3xl"> {{$article->title}} </h1>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-400 mr-2">{{$article->created_at->diffForHumans()}}</span>
                        <div>
                            @foreach($article->tags as $tag)
                                <span class="badge bg-primary rounded-pill my-1"> {{$tag->name}}</span>
                            @endforeach
                        </div>
                    </div>
                      <br>
                    <p class="text-gray-800">{{$article->text}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
