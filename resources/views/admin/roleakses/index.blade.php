@extends('layouts.master-admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row p-2">
                    <div class="col-sm-6">
                        <h5 class="m-0">Halaman Data user akses</h5>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><a href="{{ url('admin') }}">Dashboard</a></li>
                            <li class="breadcrumb-item ">Role Akses</li>
                        </ol>
                    </div>
                </div>

                {{-- Konten Data --}}
                <div class="card p-4 m-2">
                    <div class="row">
                        <div class="col-6">
                            <h5>Data Role Akses</h5>
                        </div>
                        <div class="col-6">
                            <div class="float-right mb-3">
                                <a class="btn btn-outline-primary"><i class="fas fa-download"></i>
                                    Download</a>
                                <a href="{{ route('tambahUser') }}" class="btn btn-primary"><i
                                     class="fas fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div style="overflow-x: auto;">
                        <table class="table-striped" id="table" style="min-width: 800px;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Role Akses</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $row)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->usertype }}</td>


                                        <td>
                                            <form action="{{ route('deleteUser', $row->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


