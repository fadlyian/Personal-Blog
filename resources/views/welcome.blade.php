@extends('layouts.main')

@section('title', 'Welcome')


@section('content')
<div class="container my-5">
    <div class="row justify-content-around grid gap-3">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="text-center">
                <img src="{{ asset('storage/img/profile.jpg') }}" class="rounded-circle " alt="ianganteng" style="width: 400px">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h1 class="my-5">Hi, I am Ian,Web Developer</h2>
            <p class="my-5">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur odio repellendus, iste aliquid sint ullam cumque vero, iusto rem deleniti est optio nihil, vitae numquam ipsam maxime saepe consequuntur libero.</p>

            <div class="text-center">
                <a href="/download">
                    <button type="button" class="btn btn-primary">Download CV</button>
                </a>
            </div>
        </div>
    </div>
</div>
<hr>
{{-- card --}}
<div class="container">
    <div class="row text-center mb-3">
        <h2>Blog Recently</h2>
    </div>

    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach ($articles as $as)
        <div class="col col-lg-6 mx-auto">
            <div class="card">
                @if ($as->image)
                    <img style="height: 200px; object-fit: cover" src="{{ asset('storage/'. $as->image) }}" class="card-img-top" alt="{{ $as->category->name }}">
                @else
                    <img style="height: 200px; object-fit: cover" src="http://source.unsplash.com/500x400?{{ $as->category->name }}" class="card-img-top" alt="{{ $as->category->name }}">
                @endif
              <div class="card-body">
                <h5 class="card-title">{{ $as->title }}</h5>
                <div class="text-sm p-1 text-body-secondary">
                    <small>{{$as->created_at->diffForHumans()}}</small>
                </div>
                <a href="{{ route('article.show', $as->id) }}">
                    <button class="btn btn-primary" type="button">Read more</button>
                </a>
              </div>
            </div>
          </div>
        @endforeach

    </div>
</div>
{{-- end card --}}


@endsection
