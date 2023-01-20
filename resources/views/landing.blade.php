@php
    $title = 'Home';
@endphp

@extends('layouts.materialyou')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <h1 class="display-5 fw-bold">This is <span class="text-primary fw-bold">Kemang</span>.</h1>
                <div id="map" class="card border-0 shadow-lg" style="height: 75vh"></div>
                <script>
                    const map = L.map('map').setView([-6.5029305, 106.7371722], 13);

                    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                    }).addTo(map);

                    const geojsonlayer = new L.GeoJSON.AJAX("{{ asset('assets/maps/kemang.geojson') }}").addTo(map);
                </script>

                @foreach ($spatials->get() as $key => $value)
                    <script>
                        var marker = L.marker([{{ $value->latitude }}, {{ $value->longitude }}]).addTo(map)
                            .bindPopup('<b>{{ $value->name }}</b><br />{{ $value->type->name }} at {{ $value->village->name }}');
                    </script>
                @endforeach

                <div class="mt-5"></div>
                <h1 class="display-5 fw-bold">Recommended for you!</h1>
                <div class="p-5 text-bg-primary rounded border-0 shadow-lg">
                    <h2>X village</h2>
                    <p>There are N landmarks, N ammusement park, N cafes, N restaurant in here.</p>
                </div>


                <div class="mt-5"></div>
                <h1 class="display-5 fw-bold">or browse as you go</h1>

                <div class="card border-0 shadow-lg p-5">
                    <div class="">
                        <form action="{{ route('landing') }}" method="get">
                            @csrf
                            <input type="search" name="search" class="form-control py-3" placeholder="Search places">
                            @if (request('search'))
                                <div class="d-flex flex-row align-items-baseline my-3">
                                    <p>Showing {{ $spatials->count() }} results for <span
                                            class="text-primary fw-bold">{{ request('search') }}</span></p>
                                    <a class="btn btn-secondary ms-2" href="{{ route('landing') }}">
                                        Clear
                                    </a>
                                </div>
                            @endif
                        </form>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($spatials->paginate(10) as $key => $value)
                                <tr>
                                    <th scope="row">{{ $spatials->paginate(10)->firstItem() + $key }}</th>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->address }}</td>
                                    <td>{{ $value->type->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $spatials->paginate(10)->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
