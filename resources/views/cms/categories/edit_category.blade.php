@extends('cms.cms_master')

@section('cms_content')

<h1 class="page-header mt-5">Edit Caregory: {{$category['title']}}</h1>



<div class="row mt-5">
    <div class="col-md-6">
            <form action="{{url('cms/categories/'.$category['id'])}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}

                    {{method_field('PATCH')}}
                    <input type="hidden" name="item_id" value="{{$category['id']}}}">

                    <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" id="title" name="title" class="form-control origin-text" placeholder="Title" value="{{$category['title']}}">
                            <span class="text-danger">{{$errors->first('title')}}</span>
                    </div>

                    <div class="form-group">
                            <label for="url">Url:</label>
                            <input type="text" id="url" name="url" class="form-control target-text" placeholder="Url" value="{{$category['url']}}">
                            <span class="text-danger">{{$errors->first('url')}}</span>
                    </div>

                    <div class="form-group">
                            <label for="article">Article</label>
                            <textarea type="text" id="article" rows="30" name="article" class="form-control">{{$category['article']}}</textarea>
                            <span class="text-danger">{{$errors->first('article')}}</span>
                    </div>

                    <div class="form-group">
                        <label for="image">Category Image:</label>
                        <br>
                        <img width="50px" src="{{asset('images/'.$category['image'])}}" alt="">
                        <input type="file" name="image" id="image">
                    </div>


                    <a href="{{url('cms/categories')}}" class="btn btn-danger">Cancel</a>
                    <input type="submit" name="submit" value="Update" class="btn btn-primary">
                </form>

    </div>
</div>





  @endsection
