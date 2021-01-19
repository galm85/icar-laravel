<?php
$title = 'iCar | 404';
$menu = App\Menu::all()->toArray();
?>

@extends('master')

@section('content')

<div class="row mt-5">
    <div class="col-md-12">
        <div class="alert alert-warning">
            <h3> OOPS! The page not found</h3>
            <p>Error 404</p>
        </div>
    </div>
</div>

@endsection
