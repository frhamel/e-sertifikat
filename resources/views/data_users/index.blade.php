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
        <div class="table-responsive">
            <div class="d-flex justify-content-between mb-3">
                <!-- Show entries dropdown -->
                <div class="d-flex align-items-center">
        <label for="showEntries">Show</label>
        <select id="showEntries" class="form-control mx-2">
            <!-- <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option> -->
        </select>
        <span>entries</span>
    </div>

                <!-- Tambah Data button -->
                <div>
                    <a href="{{ route('data_users.create') }}" class="btn btn-sm btn-primary">
                        Tambah Data
                    </a>
                </div>
            </div>

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
                            <td>{{ $user->id }}</td>
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

            <div class="pagination-container">
    <div class="pagination-info">
        Showing {{ $datauser->firstItem() }} to {{ $datauser->lastItem() }} of {{ $datauser->total() }} entries
    </div>
    <div class="pagination-links" style="float: right;">
        <div class="pagination-prev" style="display: inline-block; margin-right: 10px;">
            @if ($datauser->previousPageUrl())
                <button class="btn btn-sm btn-light">
                    <a href="{{ $datauser->previousPageUrl() }}"><i class="fas fa-chevron-left"></i> Previous</a>
                </button>
            @else
                <button class="btn btn-sm btn-light" disabled>
                    <i class="fas fa-chevron-left"></i> Previous
                </button>
            @endif
        </div>
        @for ($i = 1; $i <= $datauser->lastPage(); $i++)
            <button class="btn btn-sm btn-light">
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



@endsection

@push('scripts')
<script>
    document.getElementById('searchInput').addEventListener('input', function() {
        var searchText = this.value.toLowerCase();
        var rows = document.querySelectorAll('#dataTable tbody tr');
        rows.forEach(function(row) {
            var cells = row.querySelectorAll('td');
            var isMatch = cells[1].textContent.toLowerCase().indexOf(searchText)!== -1 || cells[2].textContent.toLowerCase().indexOf(searchText)!== -1;
            row.style.display = isMatch? '' : 'none';
        });
    });
</script>
@endpush