@extends('layouts.admin')

@section('content')

            <nav class="navbar navbar-expand-lg navbar-light bg-white rounded mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Tambah Data Peserta</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
                 <!-- tombol back -->
                <!-- <a href="{{ route('tbl_peserta.index') }}" class="btn btn-md btn-secondary mb-3">Kembali</a> -->
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('tbl_peserta.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf 
                             <!-- tombol back -->
                <a href="{{ route('tbl_peserta.index') }}" class="btn btn-md btn-secondary mb-3">Kembali</a>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">

                            <div class="form-group">
                                <label class="font-weight-bold">NAMA</label>
                                <input type="text" class="form-control @error('peserta_name') is-invalid @enderror" name="peserta_name" value="{{ old('peserta_name') }}" placeholder="Masukkan Nama Anda">
                            
                                <!-- error message untuk title -->
                                @error('peserta_name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="font-weight-bold">NIS</label>
                                <input type="text" class="form-control @error('nis') is-invalid @enderror" name="nis" value="{{ old('nis') }}" placeholder="Masukkan NIS Anda">
                            
                                <!-- error message untuk title -->
                                @error('nis')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">KELAS</label>
                                <input type="text" class="form-control @error('class') is-invalid @enderror" name="class" value="{{ old('class') }}" placeholder="Masukkan Kelas Anda">

                                <!-- error message untuk content -->
                                @error('class')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">SEKOLAH</label>
                                <input type="text" class="form-control @error('school') is-invalid @enderror" name="school" value="{{ old('school') }}" placeholder="Masukkan Nama Sekolah Anda">

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
                                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Sangat Baik</option>
                                    <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>Cukup Baik</option>
                                    <option value="3" {{ old('status') == 3 ? 'selected' : '' }}>Baik</option>
                                </select>

                                <!-- error message untuk content -->
                                @error('status')
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
