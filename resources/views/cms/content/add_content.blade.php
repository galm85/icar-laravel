@extends('cms.cms_master')

@section('cms_content')

<h1 class="page-header mt-5">Add new Content</h1>



<div class="row mt-5">
    <div class="col-md-6">
            <form action="{{url('cms/content')}}" method="POST">
                    {{csrf_field()}}

                    <div class="form-group">
                            <label for="menu_link">Title:</label>
                            <select name="menu_id" id="menu_link" class="form-control">
                                <option value="">Choose menu link...</option>
                                @foreach ($menu as $item)
                                    <option @if (old('menu_id')==$item['id']) selected="selected" @endif value="{{$item['id']}}">{{$item['link']}}</option>

                                @endforeach
                            </select>
                            <span class="text-danger">{{$errors->first('menu_id')}}</span>
                    </div>

                    <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" id="title" name="title" class="form-control" placeholder="Title" value="{{old('title')}}">
                            <span class="text-danger">{{$errors->first('title')}}</span>
                    </div>

                    <div class="form-group">
                            <label for="article">Article</label>
                            <textarea type="text" id="article" rows="30" name="article" class="form-control">{{old('article')}}</textarea>
                            <span class="text-danger">{{$errors->first('article')}}</span>
                    </div>


                    <a href="{{url('cms/content')}}" class="btn btn-danger">Cancel</a>
                    <input type="submit" name="submit" value="Post Content" class="btn btn-primary">
                </form>

    </div>
</div>





  @endsection
