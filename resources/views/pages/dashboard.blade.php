@extends('layouts.admin')

@section('page-title')
    Dashboard Admin
@endsection

@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>150</h3>

                    <p>Data</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
       <!-- <div class="col-lg-3 col-6">-->
            <!-- small box -->
            <!-- <div class="small-box bg-success">
                <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>

                    <p>Bounce Rate</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div> -->
        <!-- ./col -->
       <!-- <div class="col-lg-3 col-6">-->
            <!-- small box -->
            <!-- <div class="small-box bg-warning">
                <div class="inner">
                    <h3>44</h3>

                    <p>User Registrations</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div> -->
        <!-- ./col -->
       <!-- <div class="col-lg-3 col-6">-->
            <!-- small box -->
            <!-- <div class="small-box bg-danger">
                <div class="inner">
                    <h3>65</h3>

                    <p>Unique Visitors</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div> -->
        <!-- ./col -->
    <!-- </div> -->
    <!-- /.row -->
    <!-- Main row -->
    <!-- <div class="row"> -->
        <!-- Left col -->
        <!-- <section class="col-lg-7 connectedSortable"> -->
            <!-- Custom tabs (Charts with tabs)-->
            <!-- <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-pie mr-1"></i>
                        Sales
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                            </li>
                        </ul>
                    </div> -->
                <!-- </div> /.card-header -->
                <!-- <div class="card-body">
                    <div class="tab-content p-0"> -->
                        <!-- Morris chart - Sales -->
                        <!-- <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                            <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                        </div>
                        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                            <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                        </div>
                    </div>
                </div> /.card-body -->
            <!-- </div> -->
            <!-- /.card -->

            <!-- DIRECT CHAT -->
           <!-- <div class="card direct-chat direct-chat-primary">
                <div class="card-header">
                    <h3 class="card-title">Direct Chat</h3>

                    <div class="card-tools">
                        <span title="3 New Messages" class="badge badge-primary">3</span>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                            <i class="fas fa-comments"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div> -->
                <!-- /.card-header -->
                <!-- <div class="card-body"> -->
                    <!-- Conversations are loaded here -->
                    <!-- <div class="direct-chat-messages"> -->
                        <!-- Message. Default to the left -->
                        <!-- <div class="direct-chat-msg">
                            <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-left">Alexander Pierce</span>
                                <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                            </div> -->
                            <!-- /.direct-chat-infos -->
                            <!-- <img class="direct-chat-img" src="{{ asset('img/user1-128x128.jpg') }}"
                                alt="message user image"> -->
                            <!-- /.direct-chat-img -->
                            <!-- <div class="direct-chat-text">
                                Is this template really for free? That's unbelievable!
                            </div> -->
                            <!-- /.direct-chat-text -->
                        <!-- </div> -->
                        <!-- /.direct-chat-msg -->

                        <!-- Message to the right -->
                        <!-- <div class="direct-chat-msg right">
                            <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-right">Sarah Bullock</span>
                                <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                            </div> -->
                            <!-- /.direct-chat-infos -->
                            <!-- <img class="direct-chat-img" src="{{ asset('img/user3-128x128.jpg') }}"
                                alt="message user image"> -->
                            <!-- /.direct-chat-img -->
                            <!-- <div class="direct-chat-text">
                                You better believe it!
                            </div> -->
                            <!-- /.direct-chat-text -->
                        <!-- </div> -->
                        <!-- /.direct-chat-msg -->


@endsection
