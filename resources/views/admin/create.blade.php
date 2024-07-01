@extends('master')
@section('content')
    <div class="container d-flex align-items-center min-vh-100">
        <div class="row w-100">
            <div class="col-md-6">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="card-header">
                            <label class="row justify-content-center">Register Here!</label>
                        </div>
                        <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" name="name" value="{{ old('name') }}">
                                @error('name')
                                <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" name="email" value="{{ old('email') }}">
                                @error('email')
                                <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" value="{{ old('password') }}">
                                @error('password')
                                <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Phone" name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="date of birth">Date of Birth</label>
                                <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth" placeholder="Date of Birth" name="date_of_birth" value="{{ old('date_of_birth') }}">
                                @error('date_of_birth')
                                <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <div class="form-check">
                                    <input class="form-check-input @error('gender') is-invalid @enderror" id="gender" type="radio" name="gender" id="male" value="1">
                                    <label class="form-check-label" for="male">
                                    Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input @error('gender') is-invalid @enderror" id="gender" type="radio" name="gender" id="female" value="0">
                                    <label class="form-check-label" for="female">
                                    Female
                                    </label>
                                </div>
                                @error('gender')
                                <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="address">Address</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Address" name="address" value="{{ old('address') }}">
                                @error('address')
                                <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="profile">Profile</label>
                                <input type="file" class="form-control @error('profile') is-invalid @enderror" id="profile" placeholder="Profile" name="profile">
                                @error('profile')
                                <small class="text-danger">*{{ $message }}</small>
                                @enderror
                            </div>
                            <div>
                                <button class="btn btn-outline-primary">Submit</button>
                                <a href="{{ route('admin.index') }}" class="btn btn-outline-dark">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
