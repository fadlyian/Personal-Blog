@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-center">{{ $article->title }}</h1>
                <p>{{ $article->image }}</p>
                <p>{{ $article->text }}</p>
            </div>
        </div>
    </div>
@endsection()
