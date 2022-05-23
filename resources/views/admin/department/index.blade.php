@extends('layouts.layout')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Department List</h1>
        @if(session()->has('msg'))
            <div class="alert alert-danger">
                {{ session()->get('msg') }}
            </div>
        @elseif(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col" class="text-center">ID</th>
                <th scope="col" class="text-center">Department Name</th>
                <th scope="col" class="text-center">Created At</th>
                <th scope="col" class="text-center">Updated At</th>
                <th scope="col" class="text-center">Edit</th>
                <th scope="col" class="text-center">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($departments as $department)
                <tr>
                    <th scope="row"> {{ $department->id }}</th>
                    <td>{{ $department->name }}</td>
                    <td>{{ $department->created_at }}</td>
                    <td>{{ $department->updated_at }}</td>
                    <td align="center">
                        <a href="/department/{{$department->id}}/edit" class="btn btn-warning">Edit</a>
                    </td>
                    <td align="center">
                        <form action="/role/{{$department->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

