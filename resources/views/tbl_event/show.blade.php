@extends('layouts.admin')

@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-white rounded mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Detail Event</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <h4 class="text-center">{{ $event->title }}</h4>
                    <table class="table table-bordered mt-3">
                        <tbody>
                            <tr>
                                <th>Nama Ttd</th>
                                <td>{{ $event->nama_ttd }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Event</th>
                                <td>{{ $event->event_date }}</td>
                            </tr>
                            <tr>
                                <th>Ttd</th>
                                <td><img src="{{ asset('storage/tbl_event/' . $event->ttd) }}" class="img-fluid rounded small-img" alt="Ttd"></td>
                            </tr>
                            <tr>
                                <th>Logo Event</th>
                                <td><img src="{{ asset('storage/tbl_event/' . $event->logo_event) }}" class="img-fluid rounded small-img" alt="Logo Event"></td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <div class="text-left">
                        <a href="{{ route('tbl_event.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .small-img {
        max-width: 150px; /* Set the maximum width */
        height: auto; /* Maintain aspect ratio */
    }
</style>

@endsection
