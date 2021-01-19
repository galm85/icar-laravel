@extends('master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="mt-5">{{str_replace('iCar | ','',$title)}}</h1>
    </div>
</div>

@if (!empty($products))
<div class="row">
    @foreach ($products as $product)
        <div class="col-md-6">
            <h3>{{$product['title']}}</h3>
        <p><img width="300" src="{{asset('images/'.$product['image'])}}"  alt=""></p>
        <p>{!!$product['article']!!}</p>
        <p><b>Price on site: {{$product['price']}}$</b></p>
        <p>
        @if (!Cart::get($product['id']))
        <input data-id="{{$product['id']}}" type="button" value="+Add to cart" class="btn btn-success add-to-cart-btn">
        @else
        <input  type="button" value="In Cart" disabled="disabled" class="btn btn-success">

        @endif
        <a href="{{url('shop/'.$cat_url.'/'.$product['url'])}}" class="btn btn-primary" >More Detailes</a>
        </p>
        </div>

    @endforeach
</div>
@endif

@endsection
