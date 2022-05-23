@extends('layouts.layout')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">User List</h1>
        @if(session()->has('msg'))
            <div class="alert alert-danger">
                {{ session()->get('msg') }}
            </div>
        @elseif(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <table class="table table-bordered table-sm">
            <thead>
            <tr>
                <th scope="col" class="text-center">ID</th>
                <th scope="col" class="text-center">Name</th>
                <th scope="col" class="text-center">Email</th>
                <th scope="col" class="text-center">Department</th>
                <th scope="col" class="text-center">Role</th>
                <th scope="col" class="text-center">Created At</th>
                <th scope="col" class="text-center">Updated At</th>
                <th scope="col" class="text-center">Update</th>
                <th scope="col" class="text-center">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row"> {{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->department->name }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
{{--                    <td align="center">--}}
{{--                        <button class="btn btn-primary">Show</button>--}}
{{--                    </td>--}}
                    <td align="center">
                        <a href="/users/{{$user->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                    <td align="center">
                        <form action="/users/{{$user->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger btn-sm" type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
