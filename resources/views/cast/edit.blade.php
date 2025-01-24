@extends('layout/master')

@section('title')
Edit Pemain
@endsection

@section('content')
<form method="POST" action="/cast/{{$data->id}}">
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
        <label for="name" class="form-label">Name</label>
        <input name="name" type="text" class="form-control" id="name" placeholder="Enter name" value="{{$data->name}}">
    </div>
    <div class="mb-3">
        <label for="age" class="form-label">Age</label>
        <input name="age" type="number" class="form-control" id="age" placeholder="Enter age" value="{{$data->age}}">
    </div>
    <div class="mb-3">
        <label for="bio" class="form-label">Bio</label>
        <textarea name="bio" class="form-control" id="bio" rows="3" placeholder="Enter bio">{{$data->bio}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<div class="text-right">
    <a href="/cast" class="btn btn-primary">Batal</a>
</div>
@endsection