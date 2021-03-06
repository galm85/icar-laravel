@extends('cms.cms_master')

@section('cms_content')

<h1 class="page-header mt-5">Add new Product</h1>



<div class="row mt-5">
    <div class="col-md-6">
            <form action="{{url('cms/products')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="categorie_id">Product Category:</label>
                        <select name="categorie_id" id="categorie_id" class="form-control">
                            <option value="">Select Category</option>
                            @foreach ($categories as $item)
                                <option @if (old('categorie_id') == $item['id']) selected="selected" @endif value="{{$item['id']}}">{{$item['title']}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{$errors->first('category_id')}}</span>
                    </div>


                    <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" id="title" name="title" class="form-control origin-text" placeholder="Title" value="{{old('title')}}">
                            <span class="text-danger">{{$errors->first('title')}}</span>
                    </div>

                    <div class="form-group">
                            <label for="url">Url:</label>
                            <input type="text" id="url" name="url" class="form-control target-text" placeholder="Url" value="{{old('url')}}">
                            <span class="text-danger">{{$errors->first('url')}}</span>
                    </div>

                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="text" id="price" name="price" class="form-control" placeholder="Price" value="{{old('price')}}">
                        <span class="text-danger">{{$errors->first('price')}}</span>
                    </div>

                    <div class="form-group">
                            <label for="article">Article</label>
                            <textarea type="text" id="article" rows="30" name="article" class="form-control">{{old('article')}}</textarea>
                            <span class="text-danger">{{$errors->first('article')}}</span>
                    </div>



                    <div class="form-group">
                        <label for="image">Product Image:</label>
                        <input type="file" name="image" id="image">
                    </div>


                    <a href="{{url('cms/products')}}" class="btn btn-danger">Cancel</a>
                    <input type="submit" name="submit" value="Save" class="btn btn-primary">
                </form>

    </div>
</div>





  @endsection
