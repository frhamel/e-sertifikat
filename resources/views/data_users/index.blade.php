@extends('layouts.admin')

@section('content')

<div class="d-flex align-items-center justify-content-between">
<h1 class="mb-0" style="font-size: 24px;">List Data User</h1>
</div>
<hr />

<table class="table table-hover table-bordered">
    <thead class="table-primary">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Password</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datauser as $datauser)
            <tr>
                <td>{{ $datauser['id'] }}</td>
                <td>{{ $datauser['name'] }}</td>
                <td>{{ $datauser['email'] }}</td>
                <td>{{ $datauser['password'] }}</td>
                <td class="text-center">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('data_users.destroy', $datauser['id']) }}" method="POST">
                        <a href="{{ route('data_users.edit', $datauser['id']) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i> EDIT
                        </a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash-alt"></i> DELETE
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
