@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body p-5">
                    <div class="text-center bg-gray-50 text-gray-800 py-24 px-6">
                        <h1 class="">ようこそ<br /><span class="">Welcome!</span></h1>
                        <a class="btn" href="/shelf" role="button">
                            <i class="fa fa-arrow-right fa-3x" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection