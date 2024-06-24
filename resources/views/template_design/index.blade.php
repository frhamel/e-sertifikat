@extends('layouts.admin')

@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-white rounded mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">List Template</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
        </div>
    </div>
</nav>

<div class="row">
    <div class="col">
        <div class="card shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center border-bottom-0">
                <a href="{{ route('template_design.create') }}" class="btn btn-primary mb-3">Add Certificate</a>
                <div class="input-group ml-auto" style="width: 300px;">
                    <input type="text" id="searchInput" class="form-control form-control-sm" placeholder="Search...">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" style="background-color: white;" id="dataTable">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Gambar Template</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sertifikat as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{!! $item->nama_template !!}</td>
                                    <td class="text-center">
                                        <img src="{{ asset('storage/template_design/' . $item->gambar_template) }}" class="rounded" style="width: 150px;">
                                    </td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('template_design.destroy', $item->template_id) }}" method="POST" style="display: inline;">
                                            <a href="{{ route('template_design.edit', $item->template_id) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center alert alert-danger">No Templates Found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer bg-white d-flex justify-content-between align-items-center border-top-0">
                <div class="pagination-info">
                    Showing {{ $sertifikat->firstItem() }} to {{ $sertifikat->lastItem() }} of {{ $sertifikat->total() }} entries
                </div>
                <div class="pagination-links ml-auto">
                    @if ($sertifikat->previousPageUrl())
                        <button class="btn btn-sm btn-light">
                            <a href="{{ $sertifikat->previousPageUrl() }}"><i class="fas fa-chevron-left"></i> Previous</a>
                        </button>
                    @else
                        <button class="btn btn-sm btn-light" disabled>
                            <i class="fas fa-chevron-left"></i> Previous
                        </button>
                    @endif

                    @for ($i = 1; $i <= $sertifikat->lastPage(); $i++)
                        <button class="btn btn-sm btn-light">
                            <a href="{{ $sertifikat->url($i) }}">{{ $i }}</a>
                        </button>
                    @endfor

                    @if ($sertifikat->nextPageUrl())
                        <button class="btn btn-sm btn-light">
                            <a href="{{ $sertifikat->nextPageUrl() }}">Next <i class="fas fa-chevron-right"></i></a>
                        </button>
                    @else
                        <button class="btn btn-sm btn-light" disabled>
                            Next <i class="fas fa-chevron-right"></i>
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.getElementById('searchInput').addEventListener('input', function() {
        var searchText = this.value.toLowerCase();
        var rows = document.querySelectorAll('#dataTable tbody tr');
        rows.forEach(function(row) {
            var namaTemplate = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            var isMatch = namaTemplate.indexOf(searchText) !== -1;
            row.style.display = isMatch ? '' : 'none';
        });
    });
</script>
@endpush
