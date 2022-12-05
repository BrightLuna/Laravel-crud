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
            <h4>Magazine</h4>
        </div>
        <div class="p-1">
            <form class="form-inline d-flex justify-content-end" action="{{ route('magazine.search') }}" method="GET"
                role="search">
                <div class="col-5 p-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" id="search"
                        aria-label="Search">
                </div>
                <div class="col-3 py-0 px-2">
                    <button class="btn btn-outline-dark my-2 my-sm-0" type="submit"><i
                            class="fa fa-search"></i></button>
                </div>
            </form>
            </form>
        </div>
    </div>


    <table class="table table-hover my-2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Publisher</th>
                <th>Price</th>
                <th>Shelf</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if (count($datas) > 0)
            @foreach ($datas as $data)
            <tr>
                <td class="align-middle">{{ $data->id_magazine }}</td>
                <td class="align-middle">{{ $data->magazine_title }}</td>
                <td class="align-middle">{{ $data->magazine_author }}</td>
                <td class="align-middle">Rp. {{ $data->price }}</td>
                <td class="align-middle">{{ $data->id_shelf }}</td>
                <td class="align-middle">
                    <a href="{{ route('magazine.edit', $data->id_magazine) }}" type="button" class="btn rounded-3"
                        style="margin: 5px;"><i class="fa fa-pencil text-black" aria-hidden="false"></i></a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn" data-bs-toggle="modal"
                        data-bs-target="#hapusModal{{ $data->id_magazine }}" style="margin: 5px;">
                        <i class="fa fa-recycle"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $data->id_magazine }}" tabindex="-1"
                        aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Confirm</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('magazine.recycle', $data->id_magazine) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Are you sure to recycle this data?
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
                <td colspan="6" class="text-center py-3">No Data</td>
            </tr>
            @endif
        </tbody>
    </table>
    <div class="col-4 my-3"><a href="{{ route('magazine.create') }}" type="button" class="btn rounded-3"><i
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
                <td class="align-middle">{{ $data->magazine_title }}</td>
                <td class="align-middle">
                    <a href="{{ route('magazine.restore', $data->id_magazine) }}" type="button"
                        class="btn rounded-3" style="margin: 5px;"><i class="fa fa-undo text-black"
                            aria-hidden="false"></i></a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn" data-bs-toggle="modal"
                        data-bs-target="#hapusModal{{ $data->id_magazine }}" style="margin: 5px;">
                        <i class="fa fa-trash"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $data->id_magazine }}" tabindex="-1"
                        aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Confirm</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('magazine.delete', $data->id_magazine) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Are you sure to delete this data?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Back</button>
                                        <button type="submit" class="btn btn-primary">Yes</button>
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
                <td colspan="6" class="text-center py-3">No Data</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@stop