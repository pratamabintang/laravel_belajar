@extends('layout/master')

@section('title')
Genre
@endsection

@section('content')
    <h1>Films in {{ $genre->name }} Genre</h1>

    @if($films->isEmpty()) <!-- Cek jika koleksi kosong -->
        <p>No films found in this genre.</p>
    @else
        <ul>
            @foreach($films as $film)
                <li>{{ $film->title }} ({{ $film->release_year }})</li>
            @endforeach
        </ul>
    @endif
@endsection