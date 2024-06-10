@extends('layouts.admin')

@section('content')

<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">Data Event</h1>
    <a href="{{ route('tbl_event.create') }}" class="btn btn-sm btn-dark">Add Data Event</a>
</div>
<hr />

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
                            <a href="{{ route('tbl_event.show', $event->event_id) }}" class="btn btn-sm btn-dark">SHOW</a>
                            <a href="{{ route('tbl_event.edit', $event->event_id) }}" class="btn btn-sm btn-warning">EDIT</a>
                            <a href="{{ route('tbl_event.template', $event->event_id) }}" class="btn btn-sm btn-primary">TEMPLATE</a>
                            <a href="{{ route('tbl_event.generate', $event->event_id) }}" class="btn btn-sm btn-secondary">GENERATE</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@endsection
