@extends('layouts.master-admin')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="content-wrapper">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h4 class="card-title"> <span> Edit Profile Page </span> </h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('s_profile') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-2 col-form-label">Profile Image</label>
                                        <div class="col-sm-10">
                                            <div class="custom-file">
                                                <input name="profile_images" type="file" class="custom-file-input"
                                                    id="image">
                                                <label class="custom-file-label" for="customFile">
                                                    Choose file
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <img id="showImage" class="rounded avatar-xl img-thumbnail"
                                                style="height: 150px; width: 150px;"
                                                src="{{ !empty($user->profile_images) ? url('uploads/profile/' . $user->profile_images) : url('uploads/profile/no_image.jpg') }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input name="name" class="form-control" type="text" id="name"
                                                value="{{ ucwords(strtolower($user->name)) }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="name" class="col-sm-2 col-form-label">Role</label>
                                        <div class="col-sm-10">
                                            <select name="usertype" id="usertype" class="form-control" disabled>
                                                <option value="" disabled selected>--- Pilih Role ---</option>
                                                <option value="1"
                                                    {{ old('usertype', $user->usertype) == '1' ? 'selected' : '' }}>
                                                    Admin</option>
                                                <option value="2"
                                                    {{ old('usertype', $user->usertype) == '2' ? 'selected' : '' }}>
                                                    Guru</option>
                                                <option value="3"
                                                    {{ old('usertype', $user->usertype) == '3' ? 'selected' : '' }}>
                                                    Orang Tua</option>
                                            </select>
                                        </div>
                                    </div>

                                    <input type="hidden" name="usertype" value="{{ $user->usertype }}">

                                    <div class="row mb-3">
                                        <label for="" class="col-sm-2 col-form-label">User Email</label>
                                        <div class="col-sm-10">
                                            <input name="email" class="form-control" type="email" id="email"
                                                value="{{ $user->email }}">
                                        </div>
                                    </div>

                                    <!-- end row -->
                                    <center>
                                        <input type="submit" class="btn btn-info" value="Update Profile">
                                    </center>
                                </form>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
