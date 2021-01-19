@extends('master')
@section('content')
<div class="row mt-5 text-center">
    <div class="col-md-12">
        <h1>{{$product['title']}}</h1>
        <p> <img width="600" src="{{asset('images/'.$product['image'])}}" alt=""> </p>
        <p>{!!$product['article']!!}</p>
        <p>Price: {{$product['price']}}$</p>
        <p>
                @if (!Cart::get($product['id']))
                <input data-id="{{$product['id']}}" type="button" value="+Add to cart" class="btn btn-success add-to-cart-btn">
                @else
                <input  type="button" value="In Cart" disabled="disabled" class="btn btn-success">

                @endif
            <a href="{{url('shop/checkout')}}" class="btn btn-primary">Checkout</a>

        </p>

    </div>
</div>

@endsection
