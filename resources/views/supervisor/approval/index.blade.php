@extends('layouts.layout')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Purchase Order Approval List</h1>
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
                    <th scope="col">Item Name</th>
                    <th scope="col">Item Details</th>
                    <th scope="col">QTY</th>
                    <th scope="col">CPU</th>
                    <th scope="col">Total</th>
                    <th scope="col" colspan="2">Approval</th>
                </tr>
            </thead>
            <tbody>
                @foreach($approvals as $approval)
                <tr>
                    <th scope="row"> {{ $approval->po_id }}</th>
                    <td>{{ $approval->name }}</td>
                    <td>{{ $approval->itemName }}</td>
                    <td>{{ $approval->details }}</td>
                    <td>{{ $approval->quantity }}</td>
                    <td>{{ $approval->price }}</td>
                    <td>{{ $approval->total }}</td>
                    <td>
                        @if($approval->status_id == '5')
                            Order is canceled
                        @else
                            @if($approval->supervisor == '0')
                                Declined
                            @elseif($approval->finance == '0')
                                Declined by Finance
                            @elseif($approval->supervisor == '1')
                                Approved
                            @elseif(is_null($approval->supervisor))
                                <form action="/s/po/{{$approval->id}}/approval" method="POST">
                                    @csrf
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="approval"  value="1">
                                        <label class="form-check-label">Approve</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="approval" id="inlineRadio1" value="2">
                                        <label class="form-check-label" for="inlineRadio1">Declined</label>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                                </form>
                            @endif
                        @endif
                    </td>
{{--                    <td>--}}
{{--                        @if($approval->purchase->status_id == 1)--}}
{{--                            <form action="/po/{{$approval->id}}/declined" method="POST">--}}
{{--                                @method('PUT')--}}
{{--                                @csrf--}}
{{--                                <button class="btn btn-danger" type="submit" value="0">Declined</button>--}}
{{--                            </form>--}}
{{--                        @endif--}}
{{--                    </td>--}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
