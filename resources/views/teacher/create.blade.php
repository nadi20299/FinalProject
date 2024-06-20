@extends('master')
@section('content')
    <div class="container">
        <div class="">
            <div class="col-md-6">
                <div class="card mt-3">
                    <div class="card-body">
                        <form action="{{ route('Teacher.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" placeholder="Name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" placeholder="Email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" placeholder="Phone" name="phone">
                            </div>
                            <div class="mb-3">
                                <label for="date of birth">Date of Birth</label>
                                <input type="date" class="form-control" placeholder="Date of Birth" name="date_of_birth">
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="1">
                                    <label class="form-check-label" for="male">
                                    Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="0">
                                    <label class="form-check-label" for="female">
                                    Female
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" placeholder="Address" name="address">
                            </div>
                            <div class="mb-3">
                                <label for="profile">Profile</label>
                                <input type="file" class="form-control" placeholder="Profile" name="profile">
                            </div>
                            <div>
                                <button class="btn btn-outline-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
