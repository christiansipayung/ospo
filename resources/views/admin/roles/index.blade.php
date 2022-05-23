@extends('layouts.layout')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Role List</h1>
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
                <th scope="col" class="text-center">Role Name</th>
                <th scope="col" class="text-center">Description</th>
                <th scope="col" class="text-center">Created At</th>
                <th scope="col" class="text-center">Updated At</th>
                <th scope="col" class="text-center">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
                <tr>
                    <th scope="row"> {{ $role->id }}</th>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->description }}</td>
                    <td>{{ $role->created_at }}</td>
                    <td>{{ $role->updated_at }}</td>
                    <td align="center">
                        <form action="/role/{{$role->id}}" method="POST">
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

