@extends('buku.layout')

@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)

        <li>{{ $error }}</li>

        @endforeach
    </ul>
</div>
@endif

<div class="card mt-4">
    <div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Tambah Buku</h5>

        <form method="post" action="{{ route('buku.store') }}">
            @csrf
            <div class="mb-3">
                <label for="id_buku" class="form-label">ID Buku</label>
                <input type="text" class="form-control" id="id_buku" name="id_buku">
            </div>
            <div class="mb-3">
                <label for="judul_buku" class="form-label">Judul Buku</label>
                <input type="text" class="form-control" id="judul_buku" name="judul_buku">
            </div>
            <div class="mb-3">
                <label for="penulis_buku" class="form-label">Penulis</label>
                <input type="text" class="form-control" id="penulis_buku" name="penulis_buku">
            </div>
            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <select name="genre" id="genre" class="form-control">
                    <option value=""></option>
                    <option value="fantasy">Fantasy</option>
                    <option value="horror">Horror</option>
                    <option value="thriller">Thriller</option>
                    <option value="romance">Romance</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Tambah" />
            </div>
        </form>
    </div>
</div>

@stop