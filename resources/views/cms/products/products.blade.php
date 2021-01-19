@extends('cms.cms_master')

@section('cms_content')



<h1 class="page-header mt-5">Edit site Products</h1>

<div class="row mt-5">
        <div class="col-md-12">
            <p><a href="{{url('cms/products/create')}}" class="btn btn-primary"> Add new Product </a></p>
        </div>
</div>

<div class="row mt-5">
    <div class="col-md-8">
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Image</th>
                            <th>price</th>
                            <th>update at</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                        <tr>
                            <td>{{$item['title']}}</td>
                            <td><img width="50px" src="{{asset('images/'.$item['image'])}}" alt=""></td>
                            <td>{{$item['price']}}$</td>
                            <td>{{$item['updated_at']}}</td>
                            <td>
                                <a href="{{ url('cms/products/'.$item['id'].'/edit') }}">Edit</a>|
                                <a href="{{ url('cms/products/'.$item['id']) }}">Delete</a>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
    </div>
</div>





  @endsection
