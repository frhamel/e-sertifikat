@extends('layouts.admin')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Sertifikat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

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
                            
                                <!-- error message untuk title -->
                                @error('gambar_template')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- <div class="form-group">
                                <label class="font-weight-bold">KONTEN</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="5" placeholder="Masukkan Konten Post">{{ old('content') }}</textarea>
                             -->
                                <!-- error message untuk content -->
                                @error('content')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                           <!-- Tombol "Simpan" dan "Reset" -->
                        <div class="form-group d-flex justify-content-start">
                            <button type="submit" class="btn btn-primary mr-2">SIMPAN</button>
                            <button type="reset" class="btn btn-warning">RESET</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
</body>
</html>

@endsection