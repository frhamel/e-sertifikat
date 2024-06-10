@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0" style="font-size: 24px;">List Template</h1>
    <a href="{{ route('template_design.create') }}" class="btn btn-primary">Add Certificate</a>
</div>
<hr>
<table class="table table-hover table-bordered">
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
                    <a href="{{ route('template_design.edit', $sertifikat->template_id) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('template_design.destroy', $sertifikat->template_id) }}" method="POST" style="display: inline;">
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

<script>
    @if(session()->has('success'))
        toastr.success('{{ session('success') }}', 'BERHASIL!');
    @elseif(session()->has('error'))
        toastr.error('{{ session('error') }}', 'GAGAL!');
    @endif
</script>
@endsection
