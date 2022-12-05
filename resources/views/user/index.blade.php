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
            <h4>User</h4>
        </div>
    </div>
    <table class="table table-hover my-2">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- @if (count($datas) > 0) --}}
            @foreach ($datas as $data)
            <tr>
                <td class="align-middle">{{ $data->name }}</td>
                <td class="align-middle">{{ $data->email }}</td>
                <td class="align-middle">{{ $data->address }}</td>
                <td class="align-middle">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn" data-bs-toggle="modal"
                        data-bs-target="#hapusModal{{ $data->id }}" style="margin: 5px;">
                        <i class="fa fa-trash"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $data->id }}" tabindex="-1"
                        aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Confirm</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('user.delete', $data->id) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Are you sure to delete this data?
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
        </tbody>
    </table>
</div>
@stop