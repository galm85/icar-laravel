@extends('cms.cms_master')

@section('cms_content')



<h1 class="page-header mt-5">iCar Orders</h1>

<div class="row mt-5">
    <div class="col-md-11">
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Order Detailes</th>
                            <th>Total</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{$order->name}}</td>
                            <td>
                                <ul>
                                    @foreach (unserialize($order->data) as $item)
                                    <li>{{$item['name']}}, Price: {{$item['price']}}$, Quantity: {{$item['quantity']}} </li>

                                    @endforeach
                                </ul>
                            </td>
                            <td>{{$order->total}}$</td>
                            <td>{{$order->created_at}}</td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
    </div>
</div>





  @endsection
