@extends('layouts.layout')

@section('content')
    <!-- Begin Page Content -->
{{--    <div class="alert alert-success">--}}
{{--        <strong>Success!</strong> Indicates a successful or positive action.--}}
{{--    </div>--}}

    @if(session()->has('msg'))
        <div class="alert alert-success">
            {{ session()->get('msg') }}
        </div>
    @endif

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit Order</h5>
            </div>
            <div class="card-body">
                <form action="/po/{{$id->id}}/update" method="POST">
                    @method('PUT')
                    @csrf
{{--                    <div class="form-row">--}}
{{--                        <div class="form-group col-md-6">--}}
{{--                            <label for="inputName">Name</label>--}}
{{--                            <input type="text" class="form-control" id="name" placeholder="Name" name="name">--}}
{{--                        </div>--}}
{{--                        <div class="form-group col-md-6">--}}
{{--                            <label for="inputPhoneNumber">Email</label>--}}
{{--                            <input type="text" class="form-control" id="email" placeholder="Email" name="email">--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="form-group">
                        <label for="inputItemName">Item Name</label>
                        <input type="text" class="form-control" id="itemName" placeholder="Item Name" name="itemName" value="{{$id->itemName}}">
                    </div>
                    <div class="form-group">
                        <label for="inputDetails">Details</label>
                        <textarea class="form-control" id="details" placeholder="Please specify the detils of your order" name="details">{{$id->details}}</textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputQuantity">Quantity</label>
                            <input type="number" min="1" class="form-control" id="qty" oninput="getInputValue()" name="quantity">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPricePerUnit">Price per Unit</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" id="price" oninput="getInputValue()" name="price" min="1">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputQuantity">Total</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" value="0" id="total" name="total" readonly>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Edit Order</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function getInputValue(){
            // Selecting the input element and get its value
            var qty = document.getElementById("qty").value;
            var price = document.getElementById("price").value;
            var totalprice = price * qty;
            // Displaying the value
            // alert(price);
            // alert(qty);
            // alert("total: " + totalprice);
            document.getElementById("total").value = totalprice;
        }
    </script>
@endsection
