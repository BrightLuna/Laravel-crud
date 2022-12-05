@extends('layouts.app')

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
    <div class="card-body p-5">

        <h5 class="card-title fw-bolder mb-3">Add Manga</h5>

        <form method="post" id="addform" action="{{ route('manga.store') }}">
            @csrf
            <div class="mb-3">
                <label for="manga_title" class="form-label">Title</label>
                <input type="text" class="form-control" id="manga_title" name="manga_title">
            </div>
            <div class="mb-3">
                <label for="manga_author" class="form-label">Author</label>
                <input type="text" class="form-control" id="manga_author" name="manga_author">
            </div>
            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <select name="genre" id="genre" class="form-control">
                    <option value=""></option>
                    <option value="seinen">Seinen</option>
                    <option value="shoujo">Shoujo</option>
                    <option value="shounen">Shounen</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" min="5000">
            </div>
            <div class="mb-3">
                <label for="id_shelf" class="form-label">Shelf</label>
                <input type="number" class="form-control" id="id_shelf" name="id_shelf" min="1">
            </div>
            <div class="text-center d-flex justify-content-end">
                <div>
                    <a class="btn px-3 items-center" href="{{ route('manga.index') }}"><i class="fa fa-ban fa-2x"
                            aria-hidden="true"></i></a>
                </div>
                <div>
                    <a class="btn px-3 items-center" href="#" onclick="document.getElementById('addform').submit()"><i
                            class="fa fa-check text-black fa-2x" aria-hidden="true"></i></a>
                </div>
            </div>
        </form>
    </div>
</div>

@stop