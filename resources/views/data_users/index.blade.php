@extends('layouts.admin')

@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-white rounded mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Data User</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<div class="row">
    <div class="col">
        <div class="card shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center border-bottom-0">
                <a href="{{ route('data_users.create') }}" class="btn btn-primary">Tambah Sertifikat</a>
                <form action="{{ route('data_users.index') }}" method="GET" class="input-group ml-auto" style="width: 300px;">
                    <!-- <input type="text" class="form-control" name="search" placeholder="Cari berdasarkan Nama atau Email" value="{{ request()->get('search') }}">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button> -->
                </form>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" style="background-color: white;" id="dataTable">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datauser as $user)
                                <tr>
                                    <td>{{ ($datauser->currentPage() - 1) * $datauser->perPage() + $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('data_users.destroy', $user->id) }}" method="POST">
                                            <a href="{{ route('data_users.edit', $user->id) }}" class="btn btn-sm btn-primary">
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer bg-white d-flex justify-content-between align-items-center border-top-0">
                <div class="pagination-info">
                    Showing {{ $datauser->firstItem() }} to {{ $datauser->lastItem() }} of {{ $datauser->total() }} entries
                </div>
                <div class="pagination-links ml-auto">
                    @if ($datauser->previousPageUrl())
                        <button class="btn btn-sm btn-light">
                            <a href="{{ $datauser->previousPageUrl() }}"><i class="fas fa-chevron-left"></i> Previous</a>
                        </button>
                    @else
                        <button class="btn btn-sm btn-light" disabled>
                            <i class="fas fa-chevron-left"></i> Previous
                        </button>
                    @endif

                    @for ($i = 1; $i <= $datauser->lastPage(); $i++)
                        <button class="btn btn-sm btn-light {{ $i == $datauser->currentPage() ? 'active' : '' }}">
                            <a href="{{ $datauser->url($i) }}">{{ $i }}</a>
                        </button>
                    @endfor

                    @if ($datauser->nextPageUrl())
                        <button class="btn btn-sm btn-light">
                            <a href="{{ $datauser->nextPageUrl() }}">Next <i class="fas fa-chevron-right"></i></a>
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
    document.querySelector('input[name="search"]').addEventListener('input', function() {
        var searchText = this.value.toLowerCase();
        var rows = document.querySelectorAll('#dataTable tbody tr');
        rows.forEach(function(row) {
            var nameCell = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            var emailCell = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
            var isMatch = nameCell.indexOf(searchText) !== -1 || emailCell.indexOf(searchText) !== -1;
            row.style.display = isMatch ? '' : 'none';
        });
    });
</script>
@endpush
