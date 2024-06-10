@extends('layouts.admin')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Peserta</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <!-- tombol back -->
                <a href="{{ route('tbl_peserta.index') }}" class="btn btn-md btn-secondary mb-3">Kembali</a>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('tbl_peserta.update', $peserta->peserta_id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">NAMA</label>
                                <input type="text" class="form-control @error('peserta_name') is-invalid @enderror" name="peserta_name" value="{{ old('peserta_name', $peserta->peserta_name) }}" placeholder="Masukkan Nama Anda">
                                
                                <!-- error message untuk title -->
                                @error('peserta_name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">NIS</label>
                                <input type="text" class="form-control @error('nis') is-invalid @enderror" name="nis" value="{{ old('nis', $peserta->nis) }}" placeholder="Masukkan NIS Anda">
                                
                                <!-- error message untuk title -->
                                @error('nis')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">KELAS</label>
                                <input type="text" class="form-control @error('class') is-invalid @enderror" name="class" value="{{ old('class', $peserta->class) }}" placeholder="Masukkan Kelas Anda">
                                
                                <!-- error message untuk content -->
                                @error('class')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">SEKOLAH</label>
                                <input type="text" class="form-control @error('school') is-invalid @enderror" name="school" value="{{ old('school', $peserta->school) }}" placeholder="Masukkan Nama Sekolah Anda">
                                
                                <!-- error message untuk content -->
                                @error('school')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                       
                            <div class="form-group">
                                <label class="font-weight-bold">STATUS</label>
                                <select class="form-control @error('status') is-invalid @enderror" name="status">
                                    <option value="1" {{ old('status', $peserta->status) == 1 ? 'selected' : '' }}>1 - Sangat Baik</option>
                                    <option value="2" {{ old('status', $peserta->status) == 2 ? 'selected' : '' }}>2 - Cukup Baik</option>
                                    <option value="3" {{ old('status', $peserta->status) == 3 ? 'selected' : '' }}>3 - Baik</option>
                                </select>
                            
                                <!-- error message untuk status -->
                                @error('status')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <!-- Tombol "Update" dan "Reset" -->
                            <div class="form-group d-flex justify-content-start">
                                <button type="submit" class="btn btn-primary mr-2">UPDATE</button>
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
</body>
</html>

@endsection
