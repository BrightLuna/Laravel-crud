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

        <h5 class="card-title fw-bolder mb-3">Add Magazine</h5>

        <form method="post" id="addform" action="{{ route('magazine.store') }}">
            @csrf
            <div class="mb-3">
                <label for="magazine_title" class="form-label">Magazine Title</label>
                <input type="text" class="form-control" id="magazine_title" name="magazine_title">
            </div>
            <div class="mb-3">
                <label for="magazine_author" class="form-label">Publisher</label>
                <input type="text" class="form-control" id="magazine_author" name="magazine_author">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" min="5000">
            </div>
            <div class="mb-3">
                <label for="id_shelf" class="form-label">Shelf</label>
                <select name="id_shelf" id="id_shelf" class="form-control">
                    <option value=""></option>
                    @foreach ($shelfs as $shelf)
                    <option value="{{ $shelf->id_shelf }}">{{ $shelf->id_shelf }}</option>
                    @endforeach
                </select>
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