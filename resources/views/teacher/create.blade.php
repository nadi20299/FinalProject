@extends('master')
@section('content')
    <div class="container">
        <div class="">
            <div class="col-md-6">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" placeholder="Name">
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" placeholder="Phone">
                        </div>
                        <div class="mb-3">
                            <label for="date of birth">Date of Birth</label>
                            <input type="date" class="form-control" placeholder="Date of Birth">
                        </div>
                        <div class="mb-3">
                            <label for="date of birth">Gender</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" checked>
                                <label class="form-check-label" for="gender"></label>
                                Male
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"  id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="gender"></label>
                                Female
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" placeholder="Address">
                        </div>
                        <div class="mb-3">
                            <label for="profile">Profile</label>
                            <input type="file" class="form-control" placeholder="Profile">
                        </div>
                        <div>
                            <button class="btn btn-outline-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
