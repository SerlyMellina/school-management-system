@extends('layouts.master-admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Data</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Data Role Akses</li>
                            <li class="breadcrumb-item active"><a href="{{ route('tambah-roleakses') }}">Tambah Role</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="card p-4" style="margin: 20px;">
            <div class="container-fluid">
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf

                <div class="mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" autocomplete="off"
                    placeholder="Masukkan Nama..">
                </div>

                <div class="mb-3">
                    <label for="user">Usertype</label>
                    <input type="text" name="nama" id="nama" class="form-control" autocomplete="off"
                    placeholder="Masukkan usert Type..">
                </div>


                <div class="text-right">
                        <a href="#" class="btn btn-outline-secondary mr-2" role="button">Batal</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
