@extends('master')
@section('content')

    <div class="row mt-5">
        <div class="col-md-12">
            <h1> iCar Shop Categories</h1>
        </div>
    </div>

    <div class="row">
        @foreach ($categories as $category)
            <div class="col-md-4 col-sm-6">
                <h3 class="text-center">{{$category['title']}}</h3>
                <p class="text-center">

                    <img width="200" src="{{asset('images/'.$category['image'])}}" alt="category image">
                </p>
                <p class="text-center">{!!$category['article']!!}</p>
                <p class="text-center">
                    <a href="{{url('shop/'.$category['url'])}}" class="btn btn-primary">View Products</a>
                </p>
            </div>
        @endforeach
    </div>

@endsection
