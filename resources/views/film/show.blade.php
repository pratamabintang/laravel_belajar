@extends('layout/master')

@section('title')
Daftar Film
@endsection

@section('content')
<div class="row row-cols-1 row-cols-md-3 g-4">
    @forelse ($data as $film)
    <div class="col">
        <div class="card h-100">
            <img src="{{asset('image/'.$film->poster)}}" class="card-img-top" alt="Gambar 1">
            <div class="card-body">
                <h5 class="card-title">{{$film->title}} ({{$film->release_year}})</h5>
                <p class="card-text">{{Str::limit($film->summary, 50)}}</p>
                <form action="/film/{{$film->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="/film/{{$film->id}}" class="btn btn-primary">Details</a>
                    @auth
                    <a href="/film/{{$film->id}}/edit" class="btn btn-warning">Edit</a>
                    <input type="submit" class="btn btn-danger" value="Delete">
                    @endauth
            </form>
            </div>
        </div>
    </div>
    @empty

    @endforelse
</div>

@auth
<div class="text-right">
    <a href="/film/create" class="btn btn-primary">Tambah Film</a>
</div>
@endauth
@endsection