@extends('layouts.layout')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">All Purchase Order List</h1>
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
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Item Name</th>
                <th scope="col">Item Details</th>
                <th scope="col">QTY</th>
                <th scope="col">CPU</th>
                <th scope="col">Total</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <th scope="row"> {{ $order->id }}</th>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->user->email }}</td>
                    <td>{{ $order->itemName }}</td>
                    <td>{{ $order->details }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->price }}</td>
                    <td>{{ $order->total}}</td>
{{--                    <td>{{ $order->status->status_name}}</td>--}}
                    <form action="/po-p/{{$order->id}}/statusUpdate" method="POST">
                        @method('PUT')
                        @csrf
                        <td>
                            @if($order->status_id == '5')
                                <select name="status_id" id="" class="form-control">
                                    <option value="5" selected disabled>Order is Canceled</option>
                                </select>
                            @elseif($order->status_id == '6')
                                <select name="status_id" id="" class="form-control">
                                    <option value="6" selected disabled>Order is Declined</option>
                                </select>
                            @elseif($order->status_id == '1')
                                <select name="status_id" id="" class="form-control">
                                    <option value="1" selected disabled>Order has been Placed</option>
                                </select>
                            @elseif($order->status_id == '7')
                                <select name="status_id" id="" class="form-control">
                                    <option value="7" selected disabled>Finished</option>
                                </select>
                            @else
                                <select name="status_id" id="" class="form-control">
                                    <option value="2" @if($order->status_id == '2') selected @endif>Order has been Approved</option>
                                    <option value="3" @if($order->status_id == '3') selected @endif>Order has been Purchased</option>
                                    <option value="4" @if($order->status_id == '4') selected @endif>Order has Arrive</option>
                                    <option value="7" @if($order->status_id == '7') selected @endif>Finished</option>
                                </select>
                            @endif
                        </td>
                        <td>
                                <button type="submit" class="btn btn-warning">Save</button>
                        </td>
                    </form>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    `
@endsection
