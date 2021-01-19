@extends('cms.cms_master')

@section('cms_content')

<h3 class="page-header mt-5">Are you sure to delete this categoty?</h3>



<div class="row mt-5">
    <div class="col-md-6">
            <form action="{{ url('cms/categories/'.$id) }}" method="POST">

                    {{csrf_field()}}

                     <!-- <input type="hidden" name="_method" value="DELETE"> -->
                     {{method_field('DELETE')}}

                    <a href="{{url('cms/categories')}}" class="btn btn-default">Cancel</a>
                    <input type="submit" name="submit" value="Delete" class="btn btn-danger">
                </form>

    </div>
</div>





  @endsection
