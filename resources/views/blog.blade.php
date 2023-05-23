@extends('layouts.main')

@section('title', 'Blog ')

@section('content')
<div class="container">
    <h1 class="mx-auto">Blog</h1>
    <hr>
    {{-- card --}}
    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach ($articles as $as)
        <div class="col">
            <div class="card">
                @if ($as->image)
                    <img style="height: 200px; object-fit: cover" src="{{ asset('storage/'. $as->image) }}" class="card-img-top" alt="{{ $as->category->name }}">
                @else
                <img style="height: 200px; object-fit: cover" src="http://source.unsplash.com/500x400?{{ $as->category->name }}" class="card-img-top" alt="{{ $as->category->name }}">
                {{-- <img style="height: 200px; object-fit: cover" src="{{ asset('storage/img/blank_image.svg') }}" class="card-img-top" alt="{{ $as->category->name }}"> --}}
                @endif
              <div class="card-body">
                <h5 class="card-title">{{ $as->title }}</h5>
                <div class="text-sm p-1 text-body-secondary">{{$as->created_at->diffForHumans()}}</div>
                <a href="{{ route('article.show', $as->id) }}">
                    <button class="btn btn-primary" type="button">Read more</button>
                </a>
              </div>
            </div>
          </div>
        @endforeach
    </div>
    {{-- end card --}}
</div>
@endsection
