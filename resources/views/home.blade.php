@php
    $title = 'Dashboard';
@endphp

@extends('layouts.materialyou')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="d-flex justify-content-center">
                    <h1 class="display-5 fw-bold">Dashboard</h1>
                </div>
                <ol class="list-group">
                    <a href="{{ route('spatials.index') }}" class="text-decoration-none">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Spatials</div>
                                Manage all spatial data
                            </div>
                        </li>
                    </a>
                    <a href="{{ route('villages.index') }}" class="text-decoration-none">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Villages</div>
                                Manage villages
                            </div>
                        </li>
                    </a>
                    <a href="{{ route('types.index') }}" class="text-decoration-none">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Type and Methods</div>
                                Manage object types and methods
                            </div>
                        </li>
                    </a>
                </ol>
            </div>
        </div>
    </div>
@endsection
