@extends('layouts.master-guru')

@section('content')
    <div class="content-wrapper" style="background-color: #ddd">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col" style="background-color: white; margin: 8px; padding: 15px; border-radius: 5px">
                        <h1 class="m-0">Selamat Datang, {{ Auth::user()->name }}</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h4 class="text-light fw-bold">Siswa</h4>
                                <h6 class="text-light">
                                    <?php
                                    $count = DB::table('tbl_siswas')->count();
                                    echo "$count";
                                    ?>
                                </h6>
                            </div>
                            <a href="{{ route('siswa') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-pink">
                            <div class="inner">
                                <h4 class="text-light fw-bold">Kelas</h4>
                                <h6 class="text-light">
                                    <?php
                                    $count = DB::table('tbl_kelass')->count();
                                    echo "$count";
                                    ?>
                                </h6>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h4 class="text-light fw-bold">Tugas</h4>
                                <h6 class="text-light">5</h6>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h4 class="text-light fw-bold">Pengumpulan</h4>
                                <h6 class="text-light">26</h6>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="card">
                            <div class="card-header bg-black text-center">Perbandingan jumlah Siswa</div>
                            <canvas id="myChart"></canvas>
                        </div>

                        <script>
                            const ctx = document.getElementById('myChart');

                            new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: [''],
                                    datasets: [{
                                        label: 'Perempuan',
                                        data: [15],
                                        backgroundColor: 'red',
                                        borderWidth: 1
                                    }, {
                                        label: 'Laki-laki',
                                        data: [12],
                                        backgroundColor: 'blue',
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>



    </div>
    </div>
    </section>
    </div>
    </div>
@endsection

@section('scripts')
@endsection
