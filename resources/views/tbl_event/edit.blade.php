<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Event</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                    <a href="{{ route('tbl_event.index') }}" class="btn btn-secondary mb-3">Kembali</a>
                        <form action="{{ route('tbl_event.update', $event->event_id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Judul</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $event->title) }}" placeholder="Masukkan Judul Event">
                            
                                <!-- error message untuk title -->
                                @error('title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Event Date</label>
                                <input type="date" class="form-control @error('event_date') is-invalid @enderror" name="event_date" value="{{ old('event_date', $event->event_date) }}" placeholder="Masukkan Judul Event">
                            
                                <!-- error message untuk title -->
                                @error('event_date')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Ttd</label>
                                <input type="text" class="form-control @error('nama_ttd') is-invalid @enderror" name="nama_ttd" value="{{ old('nama_ttd', $event->nama_ttd) }}" placeholder="Masukkan Judul Event">
                            
                                <!-- error message untuk title -->
                                @error('nama_ttd')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="font-weight-bold">Ttd</label>
                                <input type="file" class="form-control @error('ttd') is-invalid @enderror" name="ttd" value="{{ old('ttd', $event->ttd) }}" placeholder="Masukkan Gambar">
                            
                            <!-- error message untuk title -->
                            @error('ttd')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div> 

                            <div class="form-group">
                                <label class="font-weight-bold">Logo Event</label>
                                <input type="file" class="form-control @error('logo_event') is-invalid @enderror" name="logo_event" value="{{ old('logo_event', $event->logo_event) }}" placeholder="Masukkan Logo">
                            
                            <!-- error message untuk title -->
                            @error('logo_event')
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