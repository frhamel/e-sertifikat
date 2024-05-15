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
        @foreach ($tabelsertifikat as $tabelsertifikat)
            <tr>
                <td>{{ $tabelsertifikat['id'] }}</td>
                <td>{{ $tabelsertifikat['name'] }}</td>
                <td>{{ $tabelsertifikat['email'] }}</td>
                <td>{{ $tabelsertifikat['password'] }}</td>
                <td class="text-center">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('tbl_sertifikat.destroy', $tabelsertifikat['id']) }}" method="POST">
                        <a href="{{ route('tbl_sertifikat.edit', $tabelsertifikat['id']) }}" class="btn btn-sm btn-primary">
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
