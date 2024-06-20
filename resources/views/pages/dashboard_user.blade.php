@extends('layouts.admin')

@section('page-title')
    Dashboard User
@endsection

@section('content')
<div class="row">
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
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
@endsection
