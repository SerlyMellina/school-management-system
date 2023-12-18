@extends('layouts.master-admin')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Profile</h1>
                    </div><!-- /.col -->

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active"><a href="{{ route('v_profile') }}">View Profile</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="col-md-4">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                            src="{{ !empty($user->profile_images) ? url('uploads/profile/' . $user->profile_images) : url('uploads/profile/no_image.jpg') }}"
                            alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center">{{ ucFirst($user->name) }}</h3>
                    <p class="text-muted text-center">
                        @if ($user->usertype === 0)
                            Siswa
                        @elseif ($user->usertype === 1)
                            Admin
                        @elseif ($user->usertype === 2)
                            Guru
                        @elseif ($user->usertype === 3)
                            Orang Tua
                        @endif
                    </p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Name</b> <a class="float-right">{{ ucFirst($user->name) }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Usertype</b> <a class="float-right">
                                @if ($user->usertype === 0)
                                    Siswa
                                @elseif ($user->usertype === 1)
                                    Admin
                                @elseif ($user->usertype === 2)
                                    Guru
                                @elseif ($user->usertype === 3)
                                    Orang Tua
                                @endif
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                        </li>
                    </ul>
                    <a href="{{ route('password') }}" class="btn btn-info btn-block"><b>Change Password</b></a>
                    <a href="{{ route('e_profile') }}" class="btn btn-warning btn-block"><b>Edit Profile</b></a>
                </div>
            </div>
        </div>

        {{-- <div class="card p-4" style="margin: 20px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="card-body">
                        <img class="img-thumbnail" style="height: 150px; width: 150px;"
                            src="{{ !empty($user->profile_images) ? url('uploads/profile/' . $user->profile_images) : url('uploads/profile/no_image.jpg') }}"
                            alt="Card image cap">
                        <div class="form-group row mt-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control ml-4" style="width: 180px;" disabled
                                value="{{ ucFirst($user->name) }}">
                        </div>
                        <div class="form-group row">
                            <label for="">Roles</label>
                            <select name="usertype" id="usertype" class="ml-4 form-control" style="width: 180px;" disabled>
                                <option value="" disabled selected>--- Pilih Role ---</option>
                                <option value="1" {{ old('usertype', $user->usertype) == '1' ? 'selected' : '' }}>
                                    Admin</option>
                                <option value="2" {{ old('usertype', $user->usertype) == '2' ? 'selected' : '' }}>
                                    Guru</option>
                                <option value="3" {{ old('usertype', $user->usertype) == '3' ? 'selected' : '' }}>
                                    Orang Tua</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control ml-4" style="width: 180px;" disabled
                                value="{{ ucFirst($user->email) }}">
                        </div>
                        <a class="btn btn-sm btn-warning float-left" href="{{ route('e_profile') }}"><i
                                class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Profile</a>
                        <a class="btn btn-sm btn-info float-left ml-3" href="{{ route('password') }}"><i
                                class="fa fa-pencil-square-o" aria-hidden="true"></i> Change Password</a>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection




















{{--


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: #e0e2e4;
        }
        .hidden {
            display: none;
        }
    </style>

</head>
<body>
    <div class="floating-message px-5">
        <div class="row bg-white shadow-lg">
            <div class="col">
                <h5 class="show pt-3 text-center">Demi keamanan segera lakukan perubahan Password</h5>
                <hr class="pb-4">
            </div>
        </div>

    </div>
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-4">
                <h5 class="show">Informasi profil<h5>
                <span class="hidden"><h5>Update Password</h5></span>
                <h6 class="show text-muted">Perbarui informasi profil dan alamat email akun Anda</h6>
                <span class="hidden text-muted"><h6>Pastikan akun Anda menggunakan kata sandi yang panjang dan acak untuk tetap aman.</h6></span>
            </div>
            <div class="col-md-8">
                <div class="container shadow-lg bg-white p-5 rounded-4">
                    <form class="show">
                        <div class="form-group">
                            <label for="photo">Upload Photo</label>
                            <input type="file" class="form-control-file" id="photo" required>
                          </div>
                          <div class="form-group mb-3">
                            <img src="#" alt="Uploaded Photo" id="preview" style="display: none; max-width: 100%; height: auto;" class="mt-3">
                            <button type="button" class="btn bg-white shadow-sm mt-2" id="selectPhoto">Select a new photo</button>
                            <button type="button" class="btn bg-white shadow-sm mt-2 mx-4" id="removePhoto">Remove photo</button>
                          </div>
                          <div class="form-group mb-3">
                            <label for="name">Nama</label>
                            <input type="text" id="name" name="name"
                            @if (old('name')) value="{{ old('name') }}"
                            @else
                                value="{{ $user->name }}" @endif
                            class="form-control">
                            <input type="text" class="form-control" name="name" id="name" required>
                          </div>
                          <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" required>
                          </div>
                          <button id="submitProfile" type="button" class="btn btn-success mt-5">Save</button> <!-- Menambahkan ID pada tombol "Save" profil -->

                    </form>
                    <form class="hidden">
                        <div class="form-group mb-3">
                            <label for="name">Current Password </label>
                            <input type="password" class="form-control pass" id="password" required>
                          </div>
                          <div class="form-group mb-3">
                            <label for="email">New Password</label>
                            <input type="password" class="form-control" id="newPassword" required>
                          </div>
                          <div class="form-group">
                            <label for="email">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword" required>
                          </div>
                          <button id="submitPassword" type="button" class="btn btn-success mt-5">Save</button> <!-- Menambahkan ID pada tombol "Save" ganti password -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        // Fungsi untuk menampilkan file yang dipilih
        document.getElementById('selectPhoto').addEventListener('click', function() {
          document.getElementById('photo').click();
        });

        // Fungsi untuk menghapus foto yang telah dipilih
        document.getElementById('removePhoto').addEventListener('click', function() {
          document.getElementById('photo').value = ''; // Menghapus nilai pada input file
          document.getElementById('preview').style.display = 'none'; // Menyembunyikan gambar pratinjau
        });

        // Fungsi untuk menampilkan foto yang dipilih
        document.getElementById('photo').addEventListener('change', function(event) {
          const file = event.target.files[0]; // Mendapatkan file yang dipilih

          if (file) {
            const reader = new FileReader(); // Membaca file menggunakan FileReader

            reader.onload = function(e) {
              document.getElementById('preview').src = e.target.result; // Menampilkan foto
              document.getElementById('preview').style.display = 'block';
            }

            reader.readAsDataURL(file); // Membaca file sebagai URL data
          }
        });

        // Mendapatkan elemen-elemen dari kelas hidden dan show
        const hiddenElements = document.querySelectorAll('.hidden');
        const shownElements = document.querySelectorAll('.show');
        const button = document.getElementById('submitProfile');

        // Menambahkan event listener untuk mengubah kelas pada klik tombol
        button.addEventListener('click', function() {
            // Iterasi melalui setiap elemen dengan kelas yang sama
            hiddenElements.forEach(function(hiddenElement) {
                hiddenElement.classList.remove('hidden'); // Menghapus kelas tertentu
                hiddenElement.classList.add('show'); // Menambahkan kelas baru
            });
            shownElements.forEach(function(shownElement) {
                shownElement.classList.remove('show'); // Menghapus kelas tertentu
                shownElement.classList.add('hidden'); // Menambahkan kelas baru
            });
        });

        // Mendapatkan referensi tombol "Save" untuk ganti password
        const submitPasswordButton = document.getElementById('submitPassword');

        // Menambahkan event listener untuk tombol "Save" ganti password
        submitPasswordButton.addEventListener('click', function(event) {
            event.preventDefault();

            // Mengambil elemen container untuk menampilkan pesan atau konten baru
            const container = document.querySelector('.container');
            const newPassword = document.getElementById('newPassword').value; // Mendapatkan nilai password baru
            const confirmPassword = document.getElementById('confirmPassword').value; // Mendapatkan nilai konfirmasi password

            // Periksa apakah password baru dan konfirmasi password cocok
            if (newPassword !== confirmPassword) {
                alert('Password baru dan konfirmasi password tidak cocok!'); // Tampilkan peringatan jika tidak cocok
            } else {
            // Tampilkan pesan jika cocok
            container.innerHTML = `
                <div class="alert alert-success mt-3 text-center" role="alert">
                Data berhasil disimpan!
                </div>
            `;};
        });
    </script>
</body>
</html> --}}
