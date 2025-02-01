@extends('layout/master')

@section('title')
Daftar Film
@endsection

@section('content')
<div class="container">
    <h2>
        {{$data->genre->name}}
    </h2>
    <div class="row">
        <div class="col-md-6">
            <div class="card p-3">
                <img src="{{asset('image/'.$data->poster)}}" class="card-img-top" alt="Gambar 1">
            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-3">
                <h2>{{$data->title}} ({{$data->release_year}})</h5>
                <p>{{$data->summary}}</p>
            </div>
        </div>
    </div>
</div>
<form action="{{ route('film.storeReview', $data->id) }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="comment" class="form-label">Komentar</label>
        <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="Masukkan komentar Anda" required></textarea>
    </div>
    <div class="mb-3">
        <label for="rating" class="form-label">Rating</label>
        <select class="form-control" id="rating" name="rating">
            <option value="" selected disabled>-- Pilih Rating --</option>
            <option value="1">⭐ 1</option>
            <option value="2">⭐⭐ 2</option>
            <option value="3">⭐⭐⭐ 3</option>
            <option value="4">⭐⭐⭐⭐ 4</option>
            <option value="5">⭐⭐⭐⭐⭐ 5</option>
        </select>
    </div> 
    <button type="submit" class="btn btn-primary">Kirim Review</button>
</form>

<div class="container mt-4">
    <div class="row">
        @forelse ($reviews as $review)
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $review->user->name }}</h5> <!-- Menampilkan nama user yang memberi review -->
                    <p class="card-text">
                        <strong>Rating:</strong> {{ str_repeat('⭐', $review->rating) }}<br>
                        <strong>Komentar:</strong> {{ $review->comment }}
                    </p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-4 mb-3">
            <p>No Reviews yet</p>
        </div>
        @endforelse
    </div>
</div>

<div class="text-right">
    <a href="/film" class="btn btn-primary">Kembali</a>
</div>
@endsection