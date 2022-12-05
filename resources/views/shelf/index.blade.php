@extends('layouts.app')

@section('content')

@if($message = Session::get('success'))
<div class="alert alert-success m2" role="alert">
    {{ $message }}
</div>
@endif

<div class="bg-white px-4 py-3 shadow-sm">
    <div class="container d-flex justify-content-between items-center align-content-center">
        <div class="p-2 my-3 d-flex flex-row">
            <div class="p-2">
                <a href="{{ route('shelf.store') }}" type="button" class="btn rounded-3">
                    <i class="fa fa-plus fa-2x" aria-hidden="true"></i>
                </a>
            </div>
            <div class="p-2">
                <h1>Shelf</h1>
            </div>
        </div>
        <div class="p-lg-4">
            <form class="form-inline row" action="{{ route('shelf.search') }}" method="GET" role="search">
                <div class="col p-0">
                    <input class="form-control mr-sm-2" type="number" placeholder="Search" name="search" id="search"
                        aria-label="Search" min="1">
                </div>
            </form>
        </div>
    </div>

    <div class="container d-flex justify-content-between">
        <div class="p-2">
            <h4>Manga</h4>
        </div>
    </div>

    <table class="table table-hover my-2">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datasmanga as $data)
            <tr>
                <td class="align-middle">{{ $data->manga_title }}</td>
                <td class="align-middle">{{ $data->manga_author }}</td>
                <td class="align-middle">Rp. {{ $data->price }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="container d-flex justify-content-between">
        <div class="p-2 mt-3">
            <h4>Doujin</h4>
        </div>
    </div>

    <table class="table table-hover my-2">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datasdoujin as $data)
            <tr>
                <td class="align-middle">{{ $data->doujin_title }}</td>
                <td class="align-middle">{{ $data->doujin_author }}</td>
                <td class="align-middle">Rp. {{ $data->price }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="container d-flex justify-content-between">
        <div class="p-2 mt-3">
            <h4>Magazine</h4>
        </div>
    </div>

    <table class="table table-hover mt-2 mb-5">
        <thead>
            <tr>
                <th>Title</th>
                <th>Publisher</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datasmagazine as $data)
            <tr>
                <td class="align-middle">{{ $data->magazine_title }}</td>
                <td class="align-middle">{{ $data->magazine_author }}</td>
                <td class="align-middle">Rp. {{ $data->price }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop