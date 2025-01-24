@extends('layout/master')

@section('title')
Pemain
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
        @forelse ($data as $cast)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$cast->name}}</td>
                <td>
                    <form action="/cast/{{$cast->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="/cast/{{$cast->id}}" class="btn btn-primary">Details</a>
                        <a href="/cast/{{$cast->id}}/edit" class="btn btn-warning">Edit</a>
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">No users</td>
            </tr>
        @endforelse
    </tbody>
</table>
<div class="text-right">
    <a href="/cast/create" class="btn btn-primary">Tambah Pemain</a>
</div>
@endsection