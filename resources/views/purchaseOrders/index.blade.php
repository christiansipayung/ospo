@extends('layouts.layout')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Your Purchase Order List</h1>
        @if(session()->has('msg'))
            <div class="alert alert-danger">
                {{ session()->get('msg') }}
            </div>
        @elseif(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">ID</th>
{{--                    <th scope="col">Name</th>--}}
{{--                    <th scope="col">Phone Number</th>--}}
                    <th scope="col">Item Name</th>
                    <th scope="col">Item Details</th>
                    <th scope="col">QTY</th>
                    <th scope="col">CPU</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <th scope="row"> {{ $order->id }}</th>
{{--                    <td>{{ $order->name }}</td>--}}
{{--                    <td>{{ $order->phoneNumber }}</td>--}}
                    <td>{{ $order->itemName }}</td>
                    <td>{{ $order->details }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->price }}</td>
                    <td>{{ $order->total }}</td>
                    <td>{{ $order->status->status_name }}</td>
                    <td>
                        @if($order->status->id == 1)
                            <a href="/po/{{$order->id}}/edit" class="btn btn-warning float-left">Edit</a>
                        @else
                            <a href="/po/{{$order->id}}/edit" class="disabled btn btn-dark float-left">Edit</a>
                        @endif
                    </td>
                    <td>
                        @if($order->status->id == 1)
                            <form action="/po/{{$order->id}}/cancel" method="POST">
                                @method('PUT')
                                @csrf
                                <button class="btn btn-danger float-left">Cancel</button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a>Important:
            You can EDIT and CANCEL your order if your status order is "Order has been placed"
        </a>
    </div>
@endsection
