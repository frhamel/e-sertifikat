@extends('layouts.admin')

@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-white rounded mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Tambah Template</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <!-- tombol back -->
            <a href="{{ route('template_design.store') }}" class="btn btn-md btn-secondary mb-3">Kembali</a>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form action="{{ route('template_design.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label class="font-weight-bold">NAMA</label>
                            <input type="text" class="form-control @error('nama_template') is-invalid @enderror" name="nama_template" value="{{ old('title') }}" placeholder="Masukkan Judul Template">
                            <!-- error message untuk title -->
                            @error('nama_template')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">GAMBAR</label>
                            <input type="file" class="form-control @error('gambar_template') is-invalid @enderror" name="gambar_template">
                            <!-- error message untuk gambar_template -->
                            @error('gambar_template')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <!-- Tombol "Simpan" dan "Reset" -->
                        <div class="form-group d-flex justify-content-start">
                            <button type="submit" class="btn btn-primary mr-2">SIMPAN</button>
                            <button type="reset" class="btn btn-warning">RESET</button>
                        </div>
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
