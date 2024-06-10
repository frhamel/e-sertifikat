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

<!-- <div class="container">
    <div class="row mb-3">
        <div class="col-6">
            <h4>Pengaturan > User</h4>
        </div>
        <div class="col-6 text-end">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" id="searchInput">
        </div>
    </div> -->
    <div class="row">
        <div class="col">
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
                        @foreach ($datauser as $datauser)
                            <tr>
                                <td>{{ $datauser['id'] }}</td>
                                <td>{{ $datauser['name'] }}</td>
                                <td>{{ $datauser['email'] }}</td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('data_users.destroy', $datauser['id']) }}" method="POST">
                                        <a href="{{ route('data_users.edit', $datauser['id']) }}" class="btn btn-sm btn-primary">
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
@endpush