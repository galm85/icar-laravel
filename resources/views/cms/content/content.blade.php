@extends('cms.cms_master')

@section('cms_content')



<h1 class="page-header mt-5">Edit site Content</h1>

<div class="row mt-5">
        <div class="col-md-12">
            <p><a href="{{url('cms/content/create')}}" class="btn btn-primary"> Add new Contact </a></p>
        </div>
</div>

<div class="row mt-5">
    <div class="col-md-8">
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Updated At</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($content as $item)
                        <tr>
                            <td>{{$item['title']}}</td>
                            <td>{{$item['updated_at']}}</td>
                            <td>
                                <a href="{{ url('cms/content/'.$item['id'].'/edit') }}">Edit</a>|
                                <a href="{{ url('cms/content/'.$item['id']) }}">Delete</a>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
    </div>
</div>





  @endsection
