@extends('layout/master')

@section('title')
Genre
@endsection

@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $genre)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$genre->name}}</td>
                <td>
                    <form action="/genre/{{$genre->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        @auth
                        <a href="/genre/{{$genre->id}}" class="btn btn-primary">Details</a>
                        <a href="/genre/{{$genre->id}}/edit" class="btn btn-warning">Edit</a>
                        <input type="submit" class="btn btn-danger" value="Delete">
                        @endauth
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">No genres</td>
            </tr>
        @endforelse
    </tbody>
</table>
@auth
<div class="text-right">
    <a href="/genre/create" class="btn btn-primary">Tambah Genre</a>
</div>
@endauth
@endsection