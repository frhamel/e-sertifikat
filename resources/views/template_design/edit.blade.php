@extends('layouts.admin')

@section('content')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Post </title>
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
                        <form action="{{ route('template_design.update', $sertifikat->template_id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                        <div class="form-group"> 
                            <label class="font-weight-bold">NAMA</label>
                            <input type="text" class="form-control @error('nama_template') is-invalid @enderror" name="nama_template" value="{{ old('nama_template', $sertifikat->nama_template ?? '') }}" placeholder="Masukkan Judul Template">
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
    CKEDITOR.replace( 'content' );
</script>
</body>
</html>

@endsection