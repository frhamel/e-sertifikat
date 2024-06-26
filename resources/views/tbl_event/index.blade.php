@extends('layouts.admin')

@section('content')

<div class="card mb-3" style="background-color: white; padding: 20px;">
    <div class="d-flex align-items-center justify-content-between">
        <h4 class="mb-0">Data Event</h4> <!-- Mengubah tulisan menjadi huruf kecil -->
        <a href="{{ route('tbl_event.create') }}" class="btn btn-sm btn-dark">Add Data Event</a>
    </div>
</div>

<div class="card" style="background-color: white; padding: 20px;">
    @if ($event->isEmpty())
        <div class="alert alert-danger">
            Data Event belum tersedia.
        </div>
    @else
        <table class="table table-hover">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Template Id</th>
                    <th>Title</th>
                    <th>Event Date</th>
                    <th>Nama Ttd</th>
                    <th>Ttd</th>
                    <th>Logo Event</th>
                    <th>Aksi</th>
                </tr> 
            </thead>
            <tbody>
                @foreach ($event as $event)
                    <tr>
                        <td>{{ $event->event_id }}</td>
                        <td>{{ $event->template_id }}</td>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->event_date }}</td>
                        <td>{{ $event->nama_ttd }}</td>
                        <td class="text-center">
                            <img src="{{ asset('storage/tbl_event/'.$event->ttd) }}" class="rounded" style="width: 80px">
                        </td>
                        <td class="text-center">
                            <img src="{{ asset('storage/tbl_event/'.$event->logo_event) }}" class="rounded" style="width: 80px">
                        </td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('tbl_event.destroy', $event->event_id) }}" method="POST">
                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
                                <a href="{{ route('tbl_event.show', $event->event_id) }}" class="btn btn-sm btn-dark"><i class="fa-solid fa-eye"></i></a>
                                <a href="{{ route('tbl_event.edit', $event->event_id) }}" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="{{ route('tbl_event.template', $event->event_id) }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-list"></i></a>
                                <a href="{{ route('generate-sertifikat', $event->event_id) }}" class="btn btn-sm btn-secondary"><i class="fas fa-print"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

@endsection
