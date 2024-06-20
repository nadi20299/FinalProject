@extends('master')
@section('content')
    <div class="container">
        <div class="">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                           <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Date of Birth</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Profile</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>1.</th>
                                    <td>Nadi</td>
                                    <td>drnaditunoo@gmail.com</td>
                                    <td>09771286242</td>
                                    <td>02/20/1999</td>
                                    <td>Female</td>
                                    <td>Yangon</td>
                                    <td>Profile</td>
                                    <td>
                                        <a href="" class="btn btn-outline-warning">Edit</a>
                                        <form action="" method="POST" class="d-inline-block">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <th>2.</th>
                                    <td>Yumon</td>
                                    <td>yumonkyaw711@gmail.com</td>
                                    <td>0912345678</td>
                                    <td>02/04/1999</td>
                                    <td>Female</td>
                                    <td>Yangon</td>
                                    <td>Profile</td>
                                    <td>
                                        <a href="" class="btn btn-outline-warning">Edit</a>
                                        <form action="" method="POST" class="d-inline-block">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
