@extends('layouts.app')

@section('content')

@if($message = Session::get('success'))
<div class="alert alert-success m2" role="alert">
    {{ $message }}
</div>
@endif

<div class="bg-white px-4 py-3 shadow-sm ">
    <div class="container d-flex justify-content-between">
        <div class="p-2">
            <h4>Manga</h4>
        </div>
        <div class="p-1">
            <form class="form-inline d-flex justify-content-end" action="{{ route('manga.search') }}" method="GET" role="search">
                <div class="col-5 p-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" id="search"
                        aria-label="Search">
                </div>
                <div class="col-3 py-0 px-2">
                    <button class="btn btn-outline-dark my-2 my-sm-0" type="submit"><i
                            class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>


    <table class="table table-hover my-2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Price</th>
                <th>Shelf</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if (count($datas) > 0)
            @foreach ($datas as $data)
            <tr>
                <td class="align-middle">{{ $data->id_manga }}</td>
                <td class="align-middle">{{ $data->manga_title }}</td>
                <td class="align-middle">{{ $data->manga_author }}</td>
                <td class="align-middle">{{ $data->genre }}</td>
                <td class="align-middle">Rp. {{ $data->price }}</td>
                <td class="align-middle">{{ $data->id_shelf }}</td>
                <td class="align-middle">
                    <a href="{{ route('manga.edit', $data->id_manga) }}" type="button"
                        class="btn rounded-3 hover:transform hover:scale-150" style="margin: 5px;)"><i
                            class="fa fa-pencil text-black" aria-hidden="false"></i></a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn" data-bs-toggle="modal"
                        data-bs-target="#hapusModal{{ $data->id_manga }}" style="margin: 5px;">
                        <i class="fa fa-recycle"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $data->id_manga }}" tabindex="-1"
                        aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Confirm</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('manga.recycle', $data->id_manga) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Are you sure to recycle this data?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Back</button>
                                        <button type="submit" class="btn btn-success">Yes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="7" class="text-center py-3">No Data</td>
            </tr>
            @endif
        </tbody>
    </table>
    <div class="col-4 my-3"><a href="{{ route('manga.create') }}" type="button" class="btn rounded-3"><i
                class="fa fa-plus fa-2x" aria-hidden="true"></i></a>
    </div>
    <div class="container d-flex justify-content-between">
        <div class="p-2">
            <h4>Recycle Bin</h4>
        </div>
    </div>
    <table class="table table-hover my-2">
        <thead>
            <tr>
                <th>Title</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if (count($recycles) > 0)
            @foreach ($recycles as $data)
            <tr>
                <td class="align-middle">{{ $data->manga_title }}</td>
                <td class="align-middle">
                    <a href="{{ route('manga.restore', $data->id_manga) }}" type="button" class="btn rounded-3"
                        style="margin: 5px;"><i class="fa fa-undo text-black" aria-hidden="false"></i></a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn hover scale-90" data-bs-toggle="modal"
                        data-bs-target="#hapusModal{{ $data->id_manga }}" style="margin: 5px;">
                        <i class="fa fa-trash"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $data->id_manga }}" tabindex="-1"
                        aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Confirm</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('manga.delete', $data->id_manga) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Are you sure to delete this data?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Back</button>
                                        <button type="submit" class="btn btn-danger">Yes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="2" class="text-center py-3">No Data</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@stop