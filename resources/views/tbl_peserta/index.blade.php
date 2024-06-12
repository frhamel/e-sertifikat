@extends('layouts.admin')

@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-white rounded mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">List Data Peserta</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
        </div>
        <a href="{{ route('tbl_peserta.create') }}" class="btn btn-primary">Add Data Peserta</a>
    </div>
</nav>

<div class="table-responsive">
    <table class="table table-hover table-bordered" style="background-color: white;" id="dataTable">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Nama Peserta</th>
                <th>NIS</th>
                <th>Kelas</th>
                <th>Sekolah</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($peserta as $peserta)
                <tr>
                    <td>{{ $peserta->peserta_id }}</td>
                    <td>{!! $peserta->peserta_name !!}</td>
                    <td>{!! $peserta->nis !!}</td>
                    <td>{!! $peserta->class !!}</td>
                    <td>{!! $peserta->school !!}</td>
                    <td>
                        @switch($peserta->status)
                            @case(1)
                                Sangat Baik
                                @break
                            @case(2)
                                Cukup Baik
                                @break
                            @case(3)
                                Baik
                                @break
                        @endswitch
                    </td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('tbl_peserta.destroy', $peserta->peserta_id) }}" method="POST" style="display: inline;">
                            <a href="{{ route('tbl_peserta.show', $peserta->peserta_id) }}" class="btn btn-sm btn-warning">
                                <i class="fa-solid fa-circle-info"></i>
                            </a>
                            <a href="{{ route('tbl_peserta.edit', $peserta->peserta_id) }}" class="btn btn-sm btn-primary">
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
                    <td colspan="7" class="text-center alert alert-danger">No Found.</td>
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
