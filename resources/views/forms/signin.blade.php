@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Sign in to iCar</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <form action="" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="text" id="email" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">
                    <span class="text-danger">{{$errors->first('email')}}</span>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                    <span class="text-danger">{{$errors->first('password')}}</span>
                </div>

                <input type="submit" name="submit" value="Sign in" class="btn btn-primary">
            </form>
        </div>
    </div>



@endsection
