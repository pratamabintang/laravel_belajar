@extends('layout/master')

@section('title')
Tambah Genre
@endsection

@section('content')
<form method="POST" action="/genre">
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
        <label for="name" class="form-label">Genre Name</label>
        <input name="name" type="text" class="form-control" id="name" placeholder="Enter name">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection