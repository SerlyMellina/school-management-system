@extends('layouts.master-siswa')

@section('addCss')
    <!-- Add DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-wrapper" style="background-color: #ddd">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Presensi</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('siswa') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Presensi</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover table-bordered mb-0" id="presensi-table">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Mapel</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($presensi as $presensi)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $presensi->mapel ? $presensi->mapel->nama_mapel : 'Belum ada Siswa' }}</td>
                                        <td>{{ $presensi->siswa ? $presensi->siswa->nama : 'Belum ada Siswa' }}</td>
                                        <td>{{ $presensi->tgl_presensi }}</td>
                                        <td class="text-center">
                                            <span
                                                class="badge {{ $presensi->status == 'Hadir' ? 'badge-success' : 'badge-danger' }} "style="width: 5rem;">
                                                {{ $presensi->status }}
                                            </span>
                                        </td>
                                        <td>{{ $presensi->keterangan }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
    <!-- /.content -->
@endsection

@section('addJS')
    <!-- Add DataTables JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#presensi-table').DataTable();
        });
    </script>
@endsection
