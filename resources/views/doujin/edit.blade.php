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

        <h5 class="card-title fw-bolder mb-3">Edit {{ $data->doujin_title }}</h5>

        <form method="post" id="addform" action="{{ route('doujin.update', $data->id_doujin) }}">
            @csrf
            <div class="mb-3">
                <label for="doujin_title" class="form-label">Doujin Title</label>
                <input type="text" class="form-control" id="doujin_title" name="doujin_title" value="{{ $data->doujin_title }}">
            </div>
            <div class="mb-3">
                <label for="doujin_author" class="form-label">Doujin Author</label>
                <input type="text" class="form-control" id="doujin_author" name="doujin_author" value="{{ $data->doujin_author }}">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $data->price }}" min="5000">
            </div>
            <div class="mb-3">
                <label for="id_shelf" class="form-label">Shelf</label>
                <select name="id_shelf" id="id_shelf" class="form-control">
                    @foreach ($shelfs as $shelf)
                    <option value="{{ $shelf->id_shelf }}">{{ $shelf->id_shelf }}</option>
                    @endforeach
                </select>
            </div>
            <div class="text-center d-flex justify-content-end">
                <div>
                    <a class="btn px-3 items-center" href="{{ route('doujin.index') }}"><i class="fa fa-ban fa-2x"
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