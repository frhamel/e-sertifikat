<aside class="main-sidebar sidebar-light-success-primary elevation-4">
<head>
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>

    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('img/logo-esertifikat.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-4" style="width: 40px; height: 50px;">
            <!-- style="opacity: .5"> -->
        <span class="brand-text font-weight-light"style="font-size: 25px; font-family: 'Segoe UI', sans-serif;">E-Sertifikat</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('img/photoadmin.jpg') }}" class="img-circle elevation-2" style="width: 40px; height: 45px;" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div> --}}

      <!-- SidebarSearch Form -->
<div class="form-inline mt-3">
    <div class="input-group" data-widget="sidebar-search" style="background-color: #F5FFFE;">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
            aria-label="Search">
        <div class="input-group-append">
            <button class="btn btn-sidebar" style="background-color: #F5FFFE; border-color: #F5FFFE;">
                <i class="fas fa-search fa-fw" style="color: #000;"></i>
            </button>
        </div>
    </div>
</div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @if (auth()->user()->role_id == 2)
                <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->

                    <li class="nav-item">
                    <a href="{{route ('dashboard_user') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right badge badge-danger"></i>
                        </p>
                    </a>

                    <li class="nav-item">
                    <a href="{{route ('tbl_event.index') }}" class="nav-link">
                        <i class="fas fa-calendar-alt"></i>
                        <p>
                            Data Event 
                            <i class="right badge badge-danger"></i>
                        </p>
                    </a>

                    <li class="nav-item">
                   <a href="{{ route('tbl_peserta.index') }}" class="nav-link">
                   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
                   <i class="fa-solid fa-user-plus"></i>
                        <p>
                             Peserta
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                @else
                <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right badge badge-danger"></i>
                        </p>
                    </a>
                   <!-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sub menu 1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sub menu 2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sub menu 3</p>
                            </a>
                        </li>
                    </ul>
                </li>-->
                <li class="nav-item">
                   <a href="{{ route('template_design.index') }}" class="nav-link">
                    <!-- Tambahkan CDN Font Awesome di sini -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
                   <i class="fa-solid fa-palette"></i>
                        <p>
                             Template Design
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
        </a>
        <li class="nav-item">
                   <a href="{{ route('data_users.index') }}" class="nav-link">
                   <i class="fa fa-user-circle"></i> <!-- Font Awesome 4 -->
                        <p>
                             Data Users
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                    <!-- <li class="nav-item">
                   <a href="{{ route('tbl_peserta.index') }}" class="nav-link">
                   <i class="fa-solid fa-user-plus"></i>
                        <p>
                             Peserta
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li> -->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->

                @endif
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <!-- <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right badge badge-danger"></i>
                        </p>
                    </a> -->
                   <!-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sub menu 1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sub menu 2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sub menu 3</p>
                            </a>
                        </li>
                    </ul>
                </li>-->
                <!-- <li class="nav-item">
                   <a href="{{ route('template_design.index') }}" class="nav-link">
                   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
                   <i class="fa-solid fa-palette"></i>
                        <p>
                             Template Design
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
        </a>
        <li class="nav-item">
                   <a href="{{ route('data_users.index') }}" class="nav-link">
                   <i class="fa fa-user-circle"></i> 
                        <p>
                             Data Users
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
        </li>
                    <li class="nav-item">
                   <a href="{{ route('tbl_peserta.index') }}" class="nav-link">
                   <i class="fa-solid fa-user-plus"></i>
                        <p>
                             Peserta
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li> -->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
