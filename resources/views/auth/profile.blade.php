@extends('layouts.master')

@section('title')
My Profile
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>Profile</h2>
            <hr>
            <h3>My Orders</h3>
            
            @foreach($orders as $order)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($order->cart->items as $item)
                                <li class="list-group-item">
                                    <span class="badge">
                
                                       Rs. {{ $item['price'] }}</span>
                                        {{ $item['item']['title'] }} |  {{ $item['qty'] }} Units
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="panel-footer">
                        <strong>Total Price : Rs.{{ $order->cart->totalprice }}</strong>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection