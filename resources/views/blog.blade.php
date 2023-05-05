@extends('layouts.main')

@section('title', 'BLOG')

@section('content')
<div class="container">
    <h1 class="mx-auto">Blog</h1>

    <form action="/pegawai/cari" method="GET">
		<input type="text" name="cari" placeholder="Cari Pegawai .." value="{{ old('cari') }}">
        <button class="btn btn-primary" type="submit">CARI</button>
	</form>

    {{-- card --}}
    <div class="row">
        @foreach ($articles as $as)
        <div class="col col-sm-6 mx-auto p-3">
            <div class="card">
              <div class="card-body text-center">
                <h5 class="card-title">{{ $as->title }}</h5>
                <p class="card-text">Deskripsi singkat mengenai card.</p>
                <p class="card-text"><small class="text-muted">{{ $as->created_ats }}</small></p>
                <a href="#" class="btn btn-primary">Go to page</a>
              </div>
            </div>
        </div>


        @endforeach
    </div>
    {{-- end card --}}
</div>
@endsection
