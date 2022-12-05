@extends('layouts.app')

@section('content')

@if($errors->any())
<div class="alert alert-danger m-2">
    <ul>
        @foreach($errors->all() as $error)

        <li>{{ $error }}</li>

        @endforeach
    </ul>
</div>
@endif

<div class="card mt-4">
    <div class="card-body p-5">

        <h5 class="card-title fw-bolder mb-3">Edit {{ $data->magazine_title }}</h5>

        <form method="post" id="addform" action="{{ route('magazine.update', $data->id_magazine) }}">
            @csrf
            <div class="mb-3">
                <label for="magazine_title" class="form-label">Magazine Title</label>
                <input type="text" class="form-control" id="magazine_title" name="magazine_title"
                    value="{{ $data->magazine_title }}">
            </div>
            <div class="mb-3">
                <label for="magazine_author" class="form-label">Publisher</label>
                <input type="text" class="form-control" id="magazine_author" name="magazine_author"
                    value="{{ $data->magazine_author }}">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $data->price }}" min="5000">
            </div>
            <div class="mb-3">
                <label for="id_shelf" class="form-label">Shelf</label>
                <input type="number" class="form-control" id="id_shelf" name="id_shelf" value="{{ $data->id_shelf }}" min="1">
            </div>
            <div class="text-center d-flex justify-content-end">
                <div>
                    <a class="btn px-3 items-center" href="{{ route('magazine.index') }}"><i class="fa fa-ban fa-2x"
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