@extends('layouts.app')
@section('title', 'Profile Setting')
@section('content')
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card radius-10">
                <div class="card-body">
                    <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <h5 class="mb-3">Profile Setting</h5>
                        <div class="mb-4 d-flex flex-column gap-3 align-items-center justify-content-center">
                            <div id="image-preview" class="user-change-photo shadow">
                                <img src="{{ url($admin->avatar) }}" alt="avatar">
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="formFile" class="form-label">Avatar</label>
                                <input class="form-control @error('avatar') is-invalid @enderror" type="file" id="formFile" name="avatar">
                                @error('avatar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <h5 class="mb-0 mt-4">My Profile</h5>
                        <hr>
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{ old('name', $admin->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <h5 class="mb-0 mt-4">My Account</h5>
                        <hr>
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Username</label>
                                <input class="form-control @error('username') is-invalid @enderror" name="username" type="text" placeholder="Username" value="{{ old('username', $admin->username) }}">
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label">Old Password</label>
                                <input class="form-control @error('old_password') is-invalid @enderror" name="old_password" type="password" placeholder="Old Password">
                                @error('old_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label">New Password</label>
                                <input class="form-control @error('new_password') is-invalid @enderror" name="new_password" type="password" placeholder="New Password">
                                @error('new_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label">Confirm Password</label>
                                <input class="form-control" type="password" name="new_password_confirmation" placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="text-start mt-3">
                            <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        const chooseFile = document.getElementById("formFile");
        const imgPreview = document.getElementById("image-preview");

        chooseFile.addEventListener("change", function(){
            const files = chooseFile.files[0];
            if (files) {
                const fileReader = new FileReader();
                fileReader.readAsDataURL(files);
                fileReader.addEventListener("load", function(){
                    imgPreview.className = 'user-change-photo shadow'
                    imgPreview.innerHTML = '<img src="'+this.result+'" alt="logo">'
                });
            }
        });
    </script>
@endpush