@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <a href="{{ route('teacher.create') }}" class="btn btn-outline-success">Create +</a>
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
                                @foreach ($teachers as $teacher)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $teacher->name }}</td>
                                        <td>{{ $teacher->email }}</td>
                                        <td>{{ $teacher->phone }}</td>
                                        <td>{{ $teacher->date_of_birth }}</td>
                                        <td>{{ $teacher->gender }}</td>
                                        <td>{{ $teacher->address }}</td>
                                        <td>
                                            <img src="{{ asset('storage/teacher/'.$teacher->profile) }}" width="50px" height="50px">
                                        </td>
                                        <td>
                                            <a href="{{ route('teacher.edit',$teacher->id) }}" class="btn btn-outline-warning">E</a>
                                            <form action="{{ route('teacher.destroy',$teacher->id)}}" method="POST" class="d-inline-block">
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
