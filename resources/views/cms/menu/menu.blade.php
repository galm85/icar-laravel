@extends('cms.cms_master')

@section('cms_content')



<h1 class="page-header mt-5">Edit site Menu</h1>

<div class="row mt-5">
        <div class="col-md-12">
            <p><a href="{{url('cms/content/create')}}" class="btn btn-primary"> Add new Menu </a></p>
        </div>
</div>

<div class="row mt-5">
    <div class="col-md-8">
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Link</th>
                            <th>Updated At</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menu as $item)
                        <tr>
                            <td>{{$item['link']}}</td>
                            <td>{{$item['updated_at']}}</td>
                            <td>
                                <a href="{{ url('cms/menu/'.$item['id'].'/edit') }}">Edit</a>|
                                <a href="{{ url('cms/menu/'.$item['id']) }}">Delete</a>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
    </div>
</div>





  @endsection
