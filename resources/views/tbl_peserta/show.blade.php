<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Data Peserta</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <table class="table table-bordered mt-3">
                            <tbody>
                                <tr>
                                    <th>Nama Peserta</th>
                                    <td>{{ $peserta->peserta_name }}</td>
                                </tr>
                                <tr>
                                    <th>NIS</th>
                                    <td>{{ $peserta->nis }}</td>
                                </tr>
                                <tr>
                                    <th>Kelas</th>
                                    <td>{{ $peserta->class }}</td>
                                </tr>
                                <tr>
                                    <th>Sekolah</th>
                                    <td>{{ $peserta->school }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{ $peserta->status }}</td>
                                </tr>
                                
                            </tbody>
                        </table>
                        <hr>
                        <div class="text-left">
                            <a href="{{ route('tbl_peserta.index') }}" class="btn btn-secondary mt-3">Kembali</a>
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