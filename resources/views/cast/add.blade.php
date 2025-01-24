@extends('layout/master')

@section('title')
Tambah Pemain
@endsection

@section('content')
<form method="POST" action="/cast">
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
        <label for="name" class="form-label">Name</label>
        <input name="name" type="text" class="form-control" id="name" placeholder="Enter name">
    </div>
    <div class="mb-3">
        <label for="age" class="form-label">Age</label>
        <input name="age" type="number" class="form-control" id="age" placeholder="Enter age">
    </div>
    <div class="mb-3">
        <label for="bio" class="form-label">Bio</label>
        <textarea name="bio" class="form-control" id="bio" rows="3" placeholder="Enter bio"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection