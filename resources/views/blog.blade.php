@extends('layouts.main')

@section('title', 'BLOG')

@section('content')
<div class="container">
    <h1 class="mx-auto">Blog</h1>

    {{-- card --}}
    <div class="row">
        @foreach ($articles as $as)
        <div class="col col-sm-6 mx-auto p-3">
            <div class="card">
              <div class="card-body text-center">
                <h5 class="card-title">{{ $as->title }}</h5>
                <p class="card-text">Deskripsi singkat mengenai card.</p>
                <p class="card-text"><small class="text-muted">{{ $as->created_at }}</small></p>
                <a href="{{ route('showArticle', $as->id ) }}" class="btn btn-primary">Go to page</a>
              </div>
            </div>
        </div>
        @endforeach

        {!! $articles->links() !!}
    </div>
    {{-- end card --}}
</div>
@endsection
