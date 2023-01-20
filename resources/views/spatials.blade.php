@php
    $title = 'Dashboard';
@endphp

@extends('layouts.materialyou')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="d-flex justify-content-center">
                    <h3>Manage spatials</h3>
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
                                Add new spatial
                            </div>
                        </li>
                    </a>
                    <div class="collapse" id="collapseAddNew">
                        <li class="list-group-item">
                            <form action="{{ route('spatials.store') }}" method="post">
                                <div class="ms-2 d-flex flex-column justify-content-between align-items-baseline">
                                    @csrf

                                    <label for="formControlInputSelectVillage" class="form-label fw-semibold">Select
                                        village</label>
                                    <select id="formControlInputSelectVillage" class="form-select"
                                        aria-label="Select village" name="village_id">

                                        @forelse ($villages as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @empty
                                            <option>Not available</option>
                                        @endforelse
                                    </select>
                                    <div class="mb-2"></div>

                                    <label for="formControlInputSelectType" class="form-label fw-semibold">Select
                                        type</label>
                                    <select id="formControlInputSelectType" class="form-select" aria-label="Select type"
                                        name="type_id">

                                        @forelse ($types as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @empty
                                            <option>Not available</option>
                                        @endforelse
                                    </select>
                                    <div class="mb-2"></div>

                                    <label for="formControlInputNewName" class="form-label fw-semibold">Name</label>
                                    <input type="text" class="form-control" id="formControlInputNewName" name="name"
                                        placeholder="Example: Adam's Cafe">
                                    <div class="mb-2"></div>

                                    <label for="formControlInputNewAddress" class="form-label fw-semibold">Address</label>
                                    <input type="text" class="form-control" id="formControlInputNewAddress"
                                        name="address" placeholder="Example: Jl. Pakuan Tegal Lega">
                                    <div class="mb-2"></div>

                                    <label for="formControlInputNewLat" class="form-label fw-semibold">Latitude</label>
                                    <input type="text" class="form-control" id="formControlInputNewLat" name="latitude"
                                        placeholder="Example: 0.1234">
                                    <div class="mb-2"></div>

                                    <label for="formControlInputNewLong" class="form-label fw-semibold">Longitude</label>
                                    <input type="text" class="form-control" id="formControlInputNewLong" name="longitude"
                                        placeholder="Example: 0.1234">

                                    <div class="mb-3"></div>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </li>
                    </div>
                    @forelse ($spatials as $key => $value)
                        <a class="text-decoration-none" data-bs-toggle="collapse" href="#collapseEdit{{ $value->id }}"
                            role="button" aria-expanded="false" aria-controls="collapseEdit{{ $value->id }}">
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">{{ $value->name }}</div>
                                    <div>{{ $value->type->name }} at {{ $value->village->name }}</div>
                                    <div>{{ $value->address }}</div>
                                </div>
                            </li>
                        </a>
                        <div class="collapse" id="collapseEdit{{ $value->id }}">
                            <li class="list-group-item">
                                <form action="{{ route('spatials.update', $value->id) }}" method="post">
                                    <div class="ms-2 d-flex flex-column justify-content-between align-items-baseline">
                                        @csrf
                                        @method('put')
                                        <label for="formControlInputSelectVillage" class="form-label fw-semibold">Select
                                            village</label>
                                        <select id="formControlInputSelectVillage" class="form-select"
                                            aria-label="Select village" name="village_id">
                                            @forelse ($villages as $key => $village)
                                                <option value="{{ $village->id }}"
                                                    @if ($village->id == $value->village->id) selected @endif>{{ $village->name }}
                                                </option>
                                            @empty
                                                <option>Not available</option>
                                            @endforelse
                                        </select>
                                        <div class="mb-2"></div>

                                        <label for="formControlInputSelectType" class="form-label fw-semibold">Select
                                            type</label>
                                        <select id="formControlInputSelectType" class="form-select"
                                            aria-label="Select type" name="type_id">
                                            @forelse ($types as $key => $type)
                                                <option value="{{ $type->id }}"
                                                    @if ($type->id == $value->type->id) selected @endif>{{ $type->name }}
                                                </option>
                                            @empty
                                                <option>Not available</option>
                                            @endforelse
                                        </select>
                                        <div class="mb-2"></div>

                                        <label for="formControlInputNewName" class="form-label fw-semibold">Name</label>
                                        <input type="text" class="form-control" id="formControlInputNewName"
                                            name="name" placeholder="{{ $value->name }}">
                                        <div class="mb-2"></div>

                                        <label for="formControlInputNewAddress"
                                            class="form-label fw-semibold">Address</label>
                                        <input type="text" class="form-control" id="formControlInputNewAddress"
                                            name="address" placeholder="{{ $value->address }}">
                                        <div class="mb-2"></div>

                                        <label for="formControlInputNewLat"
                                            class="form-label fw-semibold">Latitude</label>
                                        <input type="text" class="form-control" id="formControlInputNewLat"
                                            name="latitude" placeholder="{{ $value->latitude }}">
                                        <div class="mb-2"></div>

                                        <label for="formControlInputNewLong"
                                            class="form-label fw-semibold">Longitude</label>
                                        <input type="text" class="form-control" id="formControlInputNewLong"
                                            name="longitude" placeholder="{{ $value->longitude }}">
                                        <div class="mb-3"></div>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </li>
                        </div>
                    @empty
                    @endforelse
                </ol>
                {{ $spatials->links() }}
            </div>
        </div>
    </div>
@endsection
