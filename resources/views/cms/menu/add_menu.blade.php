@extends('cms.cms_master')

@section('cms_content')

<h1 class="page-header mt-5">Add new site Menu</h1>



<div class="row mt-5">
    <div class="col-md-6">
            <form action="{{url('cms/menu')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="link">Link:</label>
                        <input type="text" id="link" name="link" class="form-control origin-text" placeholder="Link" value="{{old('link')}}">
                        <span class="text-danger">{{$errors->first('link')}}</span>
                    </div>

                    <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" id="title" name="menu_title" class="form-control" placeholder="Title" value="{{old('title')}}">
                            <span class="text-danger">{{$errors->first('menu_title')}}</span>
                    </div>

                    <div class="form-group">
                            <label for="url">Url:</label>
                            <input type="text" id="url" name="url" class="form-control target-text" placeholder="Url" value="{{old('url')}}">
                            <span class="text-danger">{{$errors->first('url')}}</span>
                    </div>


                    <a href="{{url('cms/menu')}}" class="btn btn-danger">Cancel</a>
                    <input type="submit" name="submit" value="Save" class="btn btn-primary">
                </form>

    </div>
</div>





  @endsection
