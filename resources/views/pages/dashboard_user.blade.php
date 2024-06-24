@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-12 text-center">
        <div class="welcome-message">
            <img src="{{ asset('img/gmbr dashbooard.jpeg') }}" alt="Owl Image" class="owl-image" style="width: 190px; height: 182px;">
            <h2>Selamat Datang di Halaman Dashboard E-Sertifikat</h2>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>20</h3>
                <p>Total Peserta</p>
            </div>
            <div class="icon">
                <i class="fa-solid fa-user-plus" style="font-size: 4.0em;"></i>
            </div>
            <a href="#" class="small-box-footer"></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>10</h3>
                <p>Total Event</p>
            </div>
            <div class="icon">
                <i class="fas fa-calendar-alt" style="font-size: 4.0em;"></i>
            </div>
            <a href="#" class="small-box-footer"> </a>
        </div>
    </div>
</div>

<style>
    .welcome-message {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 20px;
    }
    .owl-image {
        width: 100px;
        height: auto;
        margin-right: 20px;
    }
    .welcome-message h2 {
        font-size: 24px;
        font-weight: bold;
    }
</style>
@endsection
