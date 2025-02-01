@extends('layout/master')

@section('title')
Tambah Film
@endsection

@section('content')
<form method="POST" action="/film" enctype="multipart/form-data">
    @csrf
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input name="title" type="text" class="form-control" id="title" placeholder="Enter title">
    </div>
    <div class="mb-3">
        <label for="summary" class="form-label">Summary</label>
        <textarea name="summary" class="form-control" id="summary" rows="3" placeholder="Enter summary"></textarea>
    </div>
    <div class="mb-3">
        <label for="release_year" class="form-label">Release Year</label>
        <input name="release_year" type="text" class="form-control" id="release_year" placeholder="Enter release year">
    </div>
    <div class="mb-3">
        <label for="poster">Poster</label><br>
        <input type="file" id="poster" name="poster">
    </div>
    <div class="mb-3">
        <label for="genre">Genre</label>
        <select id="genre" name="genre_id" class="form-control">
            <option value="" selected disabled>-- Pilih Genre --</option>
            @foreach ($genres as $genre)
                <option value="{{$genre->id}}">{{$genre->name}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<div class="text-right">
    <a href="/film" class="btn btn-primary">Batal</a>
</div>
@endsection