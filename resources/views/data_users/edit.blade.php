@extends('layouts.admin')

@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-white rounded mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Edit Data User</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <!-- <a href="{{ route('data_users.index') }}" class="btn btn-md btn-secondary mb-3">Kembali</a> -->
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form action="{{ route('data_users.update', $datauser->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <a href="{{ route('data_users.index') }}" class="btn btn-md btn-secondary mb-3">Kembali</a>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form action="{{ route('data_users.update', $datauser->id) }}" method="POST" enctype="multipart/form-data">

                        <div class="form-group"> 
                            <label class="font-weight-bold">NAMA</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $datauser->name ?? '') }}" placeholder="Masukkan Nama Anda">
                            @error('name')
                                 <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">EMAIL</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $datauser->email) }}" placeholder="Masukkan Email Anda">
                            @error('email')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group"> 
                            <label class="font-weight-bold">PASSWORD BARU</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Masukkan Password Anda">
                            <!-- Error message untuk password -->
                            @error('password')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script>
@endsection
