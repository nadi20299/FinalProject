@extends('master')
@section('content')
    <div class="container">
        <div class="">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('student.create') }}" class="btn btn-outline-success">Create +</a>
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
                                @foreach ($students as $student)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->phone }}</td>
                                    <td>{{ $student->date_of_birth }}</td>
                                    <td>{{ $student->gender }}</td>
                                    <td>{{ $student->address }}</td>
                                    <td>
                                        <img src="{{ asset('storage/student/'.$student->profile) }}" width="50px" height="50px">
                                    </td>
                                    <td>
                                        <a href="{{ route('student.edit',$student->id) }}" class="btn btn-outline-warning">E</a>
                                        <form action="{{ route('student.destroy',$student->id) }}" method="POST" class="d-inline-block">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-outline-danger">D</button>
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
