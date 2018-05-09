@extends('layouts.app')
@section('content')
    <div class="col-md-6 col-md-offset-3">
        <h2>User orders</h2>
        @foreach($orders as $order)
        <div class="panel panel-default">
            <div class="panel-heading">{{$order->created_at}} </div>
            <div class="panel-body">
                <ul class="list-group">
                    @foreach($order->cart->products as $item)

                    <li class="list-group-item">{{$item['item']['title']}} <span class="badge">Kiekis: {{$item['qty']}}</span></li>
                    @endforeach
                </ul>
            </div>
        </div>
            @endforeach

    </div>

    @endsection