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
        <a href="{{ route('template_design.create') }}" class="btn btn-primary">Add Certificate</a>
    </div>
</nav>

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
            @forelse ($sertifikat as $sertifikat)
                <tr>
                    <td>{{ $sertifikat->template_id }}</td>
                    <td>{!! $sertifikat->nama_template !!}</td>
                    <td class="text-center">
                        <img src="{{ asset('storage/template_design/' . $sertifikat->gambar_template) }}" class="rounded" style="width: 150px;">
                    </td>
                    <td class="text-center">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('template_design.destroy', $sertifikat->template_id) }}" method="POST" style="display: inline;">
                        <a href="{{ route('template_design.edit', $sertifikat->template_id) }}" class="btn btn-sm btn-primary">
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

<script>
    @if(session()->has('success'))
        toastr.success('{{ session('success') }}', 'BERHASIL!');
    @elseif(session()->has('error'))
        toastr.error('{{ session('error') }}', 'GAGAL!');
    @endif

    document.getElementById('searchInput').addEventListener('input', function() {
        var searchText = this.value.toLowerCase();
        var rows = document.querySelectorAll('#dataTable tbody tr');
        rows.forEach(function(row) {
            var cells = row.querySelectorAll('td');
            var isMatch = false;
            cells.forEach(function(cell) {
                if (cell.textContent.toLowerCase().indexOf(searchText) !== -1) {
                    isMatch = true;
                }
            });
            if (isMatch) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
@endsection
