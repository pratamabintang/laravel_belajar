@extends('layout/master')

@section('title')
Edit Film
@endsection

@section('content')
<form method="POST" action="/film/{{$data->id}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
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
        <input name="title" type="text" class="form-control" id="title" placeholder="Enter title" value="{{$data->title}}">
    </div>
    <div class="mb-3">
        <label for="summary" class="form-label">Summary</label>
        <textarea name="summary" class="form-control" id="summary" rows="3" placeholder="Enter summary">{{$data->summary}}</textarea>
    </div>
    <div class="mb-3">
        <label for="release_year" class="form-label">Release Year</label>
        <input name="release_year" type="text" class="form-control" id="release_year" placeholder="Enter release year" value="{{$data->release_year}}">
    </div>
    <div class="mb-3">
        <label for="poster">Poster</label><br>
        <input type="file" id="poster" name="poster">
    </div>
    <div class="mb-3">
        <label for="genre">Genre</label>
        <select id="genre" name="genre_id" class="form-control">
            <option value="" disabled>-- Pilih Genre --</option>
            @foreach ($genres as $genre)
                <option value="{{$genre->id}}" @if($genre->id == $data->genre_id) selected @endif>{{$genre->name}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<div class="text-right">
    <a href="/film" class="btn btn-primary">Batal</a>
</div>
@endsection