{{-- <x-main-layout>

    <x-slot:title>
        Home
    </x-slot>

</x-main-layout> --}}

@extends('layouts.main')

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
                <button type="button" class="btn btn-primary">Download CV</button>
            </div>
        </div>
    </div>
</div>
<hr>
{{-- card --}}
<div class="container">
    <div class="row text-center">
        <h2>Blog Recently</h2>
    </div>
    <div class="row">

        @foreach ($articles as $as)
        <div class="col col-sm-6 mx-auto p-3">
            <div class="card">
              <div class="card-body text-center">
                <h5 class="card-title">{{ $as->title }}</h5>
                <p class="card-text">Deskripsi singkat mengenai card.</p>
                <p class="card-text"><small class="text-muted">{{ $as->created_ats }}</small></p>
                <a href="{{ route('article.show', $as->id) }}" class="btn btn-primary">Go to page</a>
              </div>
            </div>
        </div>

        @if ($as->id == 5)
            @break
        @endif
        @endforeach

    </div>
</div>
{{-- end card --}}

@endsection
