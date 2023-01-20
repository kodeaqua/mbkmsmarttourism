@php
    $title = 'Dashboard';
@endphp

@extends('layouts.materialyou')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="d-flex justify-content-center">
                    <h1 class="display-5 fw-bold">Manage types</h1>
                </div>

                @if (session('success'))
                    <div class="alert alert-success border-0 text-center" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger border-0 text-center" role="alert">
                        {{ $errors->first() }}
                    </div>
                @endif

                <ol class="list-group">
                    <a class="text-decoration-none" data-bs-toggle="collapse" href="#collapseAddNew" role="button"
                        aria-expanded="false" aria-controls="collapseAddNew">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">New
                                </div>
                                Add new type and their weight
                            </div>
                        </li>
                    </a>
                    <div class="collapse" id="collapseAddNew">
                        <li class="list-group-item">
                            <form action="{{ route('types.store') }}" method="post">
                                <div class="ms-2 d-flex flex-column justify-content-between align-items-baseline">
                                    @csrf
                                    <label for="formControlInputNewName" class="form-label fw-semibold">Name</label>
                                    <input type="text" class="form-control" id="formControlInputNewName" name="name"
                                        placeholder="Example: Hospital">
                                    <div class="mb-2"></div>
                                    <label for="formControlInputNewWeight" class="form-label fw-semibold">Weight</label>
                                    <input type="text" class="form-control" id="formControlInputNewWeight" name="weight"
                                        placeholder="Example: 0.1">
                                    <div class="mb-3"></div>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </li>
                    </div>
                    @forelse ($types as $key => $value)
                        <a class="text-decoration-none" data-bs-toggle="collapse" href="#collapseEdit{{ $value->id }}"
                            role="button" aria-expanded="false" aria-controls="collapseEdit{{ $value->id }}">
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">{{ $value->name }}</div>
                                    Current weight: {{ $value->weight }}
                                </div>
                            </li>
                        </a>
                        <div class="collapse" id="collapseEdit{{ $value->id }}">
                            <li class="list-group-item">
                                <form action="{{ route('types.update', $value->id) }}" method="post">
                                    <div class="ms-2 d-flex flex-column justify-content-between align-items-baseline">
                                        @csrf
                                        @method('put')
                                        <label for="formControlInputNewName" class="form-label fw-semibold">Name</label>
                                        <input type="text" class="form-control" id="formControlInputNewName"
                                            name="name" placeholder="{{ $value->name }}">
                                        <div class="mb-2"></div>
                                        <label for="formControlInputNewWeight" class="form-label fw-semibold">Weight</label>
                                        <input type="text" class="form-control" id="formControlInputNewWeight"
                                            name="weight" placeholder="{{ $value->weight }}">
                                        <div class="mb-3"></div>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </li>
                        </div>
                    @empty
                    @endforelse
                </ol>
                {{ $types->links() }}
            </div>
        </div>
    </div>
@endsection
