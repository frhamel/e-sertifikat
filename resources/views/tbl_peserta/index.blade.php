@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0" style="font-size: 24px;">List Data Peserta </h1>
    <a href="{{ route('tbl_peserta.create') }}" class="btn btn-primary">Add Data Peserta</a>
</div>
<hr>
<table class="table table-hover table-bordered">
    <thead class="table-primary">
        <tr>
            <th>No</th>
            <!-- <th>User ID</th> -->
            <!-- <th>Event ID</th> -->
            <th>Nama Peserta</th>
            <th>NIS </th>
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
                <!-- <td>{{ $peserta->user_id }}</td> -->
                <!-- <td>{{ $peserta->event_id }}</td>  -->
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
                                                Baik
                                                @break
                                            @case(3)
                                                Cukup
                                                @break
                                            @case(4)
                                                Kurang
                                                @break
                                            @case(5)
                                                Sangat Kurang
                                                @break
                                        @endswitch
                                    </td>
                <td class="text-center">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('tbl_peserta.destroy', $peserta->peserta_id) }}" method="POST">
                    <a href="{{ route('tbl_peserta.show', $peserta->peserta_id) }}" class="btn btn-sm btn-warning">
                            <i class="fa-solid fa-circle-info"></i> DETAIL
                        </a>

                        <a href="{{ route('tbl_peserta.edit', $peserta->peserta_id) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i> EDIT
                        </a>
                       
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash-alt"></i> DELETE
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center alert alert-danger">No Found.</td>
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
