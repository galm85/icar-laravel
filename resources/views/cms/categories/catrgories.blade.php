@extends('cms.cms_master')

@section('cms_content')



<h1 class="page-header mt-5">Edit site Categories</h1>

<div class="row mt-5">
        <div class="col-md-12">
            <p><a href="{{url('cms/categories/create')}}" class="btn btn-primary"> Add new Category </a></p>
        </div>
</div>

<div class="row mt-5">
    <div class="col-md-8">
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Image</th>
                            <th>update at</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $item)
                        <tr>
                            <td>{{$item['title']}}</td>
                            <td><img width="50px" src="{{asset('images/'.$item['image'])}}" alt=""></td>
                            <td>{{$item['updated_at']}}</td>
                            <td>
                                <a href="{{ url('cms/categories/'.$item['id'].'/edit') }}">Edit</a>|
                                <a href="{{ url('cms/categories/'.$item['id']) }}">Delete</a>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
    </div>
</div>





  @endsection
