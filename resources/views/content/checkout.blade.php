@extends('master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>iCar Checkout Page</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @if ($cart)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Product</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Sub Total</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $item)
                        <tr>
                            <td>{{$item['name']}}</td>
                            <td class="text-center">
                                <input data-id="{{$item['id']}}" type="button" value="-" class="update-cart btn btn-danger">
                                <input class="text-center" type="text" size="2" value="{{$item['quantity']}}">
                                <input data-id="{{$item['id']}}" type="button" value="+" class="update-cart btn btn-success">
                            </td>
                            <td>{{$item['price']}}$</td>
                            <td>{{$item['quantity'] * $item['price']}}$</td>
                            <td><a href="{{url('shop/remove-item/'.$item['id'])}}">delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <p>
               <b> Total to Pay: </b>{{Cart::getTotal()}}$
               <span class="pull-right ">
                    <a href="{{url('shop/clear-cart')}}" class="btn btn-danger"> Clear Cart</a>
                </span>
            </p>
            <p>
                <a href="{{url('shop/order')}}" class="btn btn-primary" >Order Now</a>
            </p>
        @else
            <p><i>No items in cart...</i></p>
        @endif
    </div>
</div>

@endsection
