@extends('layout/master')

@section('title')
Biodata Pemain
@endsection

@section('content')
<h1 class="my-3 text-primary">{{$data->name}}</h1>
<p>{{$data->age}}</p>
<p>{{$data->bio}}</p>
<div class="text-right">
    <a href="/cast" class="btn btn-primary">Kembali</a>
</div>
@endsection