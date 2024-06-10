<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Info</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .small-img {
            max-width: 150px; /* Set the maximum width */
            height: auto; /* Maintain aspect ratio */
        }
    </style>
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h4 class="text-center">{{ $event->title }}</h4>
                        <table class="table table-bordered mt-3">
                            <tbody>
                                <tr>
                                    <th>Nama Ttd</th>
                                    <td>{{ $event->nama_ttd }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Event</th>
                                    <td>{{ $event->event_date }}</td>
                                </tr>
                                <tr>
                                    <th>Ttd</th>
                                    <td><img src="{{ asset('storage/tbl_event/' . $event->ttd) }}" class="img-fluid rounded small-img" alt="Ttd"></td>
                                </tr>
                                <tr>
                                    <th>Logo Event</th>
                                    <td><img src="{{ asset('storage/tbl_event/' . $event->logo_event) }}" class="img-fluid rounded small-img" alt="Logo Event"></td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <div class="text-left">
                            <a href="{{ route('tbl_event.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
