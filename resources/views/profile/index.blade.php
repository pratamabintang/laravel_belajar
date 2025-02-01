@extends('layout/master')

@section('title')
Edit Profile
@endsection

@section('content')
<form method="POST" action="/profile/{{$detail->user_id}}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="age" class="form-label">Umur</label>
        <input name="age" type="text" class="form-control" id="age" placeholder="Enter age" value="{{$detail->age}}">
    </div>
    <div class="mb-3">
        <textarea name="bio" id="bio" class="form-control">{{$detail->bio}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection