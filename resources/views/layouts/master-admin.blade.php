<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @yield('title')
    </title>

    {{-- CSS DataTables --}}
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('/dist/css/adminlte.min.css') }}">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    {{-- custom CSS --}}
    <link rel="stylesheet" href="{{ asset('/css/custom.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    @yield('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        {{-- Start Navbar --}}
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars fa-lg mt-2"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <div class="btn-group" role="group">
                        <a id="btnGroupDrop1" style="color: black; margin-right: 40px;" type="button"
                            class="dropdown-toggle text-capitalize" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="nav-icon fas fa-user-circle"></i> &nbsp; {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <a class="dropdown-item" href="{{ route('v_profile') }}"><i
                                    class="nav-icon fas fa-user"></i>
                                &nbsp; My Profile</a>
                            <a class="dropdown-item" href="{{ url('/logout') }}"><i
                                    class="nav-icon fas fa-sign-out-alt"></i> &nbsp;
                                Log Out</a>
                        </div>
                    </div>
                </li>
            </ul>
            <!-- Notifications Dropdown Menu -->
        </nav>
        <!-- /.navbar -->

        {{-- Sidebar Section --}}
        <aside class="main-sidebar sidebar-dark-primary" id="sidebar">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="{{ asset('img/logo-sekolah.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text text-light">DASHBOARD ADMIN</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ !empty(Auth::user()->profile_images) ? url('uploads/profile/' . Auth::user()->profile_images) : url('uploads/profile/no_image.jpg') }}"
                            class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info text-light">
                        {{ Auth::user()->name }}
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Menu sidebar --}}
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        {{-- Dashboard --}}
                        <li class="nav-item">
                            <a href="{{ route('dashboard-admin') }}"
                                class="nav-link @if (request()->routeIs('dashboard-admin')) active @else '' @endif">
                                <i data-lucide="layout-dashboard"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        {{-- Konten --}}

                        <li class="nav-item">
                            <a href="#" class="nav-link text-light">
                                <i data-lucide="monitor-up"></i>
                                <p>Semua Data <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('siswaadm') }}" class="nav-link ml-3 text-light">
                                        <i data-lucide="graduation-cap"></i>
                                        <p>Data Siswa</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('guruadm') }}" class="nav-link ml-3 text-light">
                                        <i data-lucide="book-user"></i>
                                        <p>Data Guru</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('ortuadm') }}" class="nav-link ml-3 text-light">
                                        <i data-lucide="radar"></i>
                                        <p>Data Orang Tua</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('mapeladm') }}" class="nav-link ml-3 text-light">
                                        <i data-lucide="book-check"></i>
                                        <p>Data Mata Pelajaran</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('kelasadm') }}" class="nav-link ml-3 text-light">
                                        <i data-lucide="library-square"></i>
                                        <p>Data Kelas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link ml-3 text-light">
                                        <i data-lucide="file-spreadsheet"></i>
                                        <p>Jadwal Mengajar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('presensiadm') }}" class="nav-link ml-3 text-light">
                                        <i data-lucide="list-checks"></i>
                                        <p>Data Presensi Siswa</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('nilaiadm') }}" class="nav-link ml-3 text-light">
                                        <i data-lucide="combine"></i>
                                        <p>Nilai Siswa</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('tugasadm') }}" class="nav-link ml-3 text-light">
                                        <i data-lucide="scroll-text"></i>
                                        <p>Tugas Siswa</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('pengumpulanadm') }}" class="nav-link ml-3 text-light">
                                        <i data-lucide="send-to-back"></i>
                                        <p>Pengumpulan Tugas</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('roleakses') }}">
                                <i data-lucide="person-standing"></i>
                                <p>Role Akses</p>
                            </a>
                        </li>







                        {{-- Logout --}}
                        <li class="nav-item mt-5">
                            <a href="{{ url('/logout') }}" class="nav-link">
                                <i data-lucide="log-out"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                {{-- End Menu Sidebar --}}
            </div>
            <!-- /.sidebar -->
        </aside>


        @yield('content')


        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021</strong>
            All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>

    <!-- Development version -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

    {{-- JS Datatables --}}
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Calendar --}}
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>

    <script>
        @if (session('status'))
            // alert('{{ session('status') }}')
            Swal.fire({
                title: "{{ session('status') }}",
                // text: "You clicked the button!",
                icon: "success",
                button: "OK!",
            });
        @endif

        lucide.createIcons();
    </script>

    @yield('addJS');
</body>

</html>
