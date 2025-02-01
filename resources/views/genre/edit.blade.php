@extends('layout/master')

@section('title')
Edit Genre
@endsection

@section('content')
<form method="POST" action="/genre/{{$data->id}}">
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
        <label for="name" class="form-label">Genre Name</label>
        <input name="name" type="text" class="form-control" id="name" placeholder="Enter name" value="{{$data->name}}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<div class="text-right">
    <a href="/genre" class="btn btn-primary">Batal</a>
</div>
@endsection