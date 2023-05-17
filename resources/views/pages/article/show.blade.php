@extends('layouts.main')

@section('content')
    {{-- <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-center">{{ $article->title }}</h1>
                <p>{{ $article->image }}</p>
                <p>{{ $article->text }}</p>
            </div>
        </div>
    </div> --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto flex justify-center sm:px-6 lg:px-8">
            <div class="bg-white w-full sm:w-3/5 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  {{-- @if($article->image)
                        <img class="w-full" src="{{$article->imageUrl()}}" alt="{{$article->title}}">
                        <br>
                  @endif --}}
                  <h1 class="text-3xl"> {{$article->title}} </h1>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-400 mr-2">{{$article->created_at->diffForHumans()}}</span>
                        <div>
                            @foreach($article->tags as $tag)
                                <span class="text-xs bg-blue-400 text-white rounded-lg p-1 m-1"> {{$tag->name}}</span>
                            @endforeach
                        </div>
                    </div>
                      <br>
                    <p class="text-gray-800">{{$article->text}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection()
