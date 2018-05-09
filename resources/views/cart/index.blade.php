@extends('layouts.app')

@section('content')
    @if(Session::has('cart') AND Session::get('cart')->totalPrice >0)


        <div class="container align1">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
                    <ul class="list-group">
                        @foreach($products as$product)
                            <li class="list-group-item">
                                <span class="badge">{{$product['qty']}}</span>
                                <strong>{{$product['item']['title']}}</strong>
                                <span class="label label-success">{{$product['price']}}</span>
                                <div class="btn-group">
                                    <button class="btn btn-primary btn-xs dropdown-toogle" data-toggle="dropdown">
                                        Action<span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{route('cart.deleteByOne', $product['item']['id'])}}">Reduce
                                                by 1</a></li>
                                        <li><a href="{{route('cart.deleteByItem', $product['item']['id'])}}">Reduce
                                                all</a></li>
                                    </ul>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
                    <strong>Total: {{Session::get('cart')->totalPrice}} Eur </strong>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
                    @if(Session::get('cart')->totalPrice > 0)
                    <a href="{{route('cart.checkout')}}" type="button" class="btn btn-success">Checkout</a>
                    @endif
                    <a href="{{route('home')}}" type="button" class="btn btn-success">Back</a>
                </div>
            </div>
            @else
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
                        <h2>No items in cart</h2>
                        <a href="{{route('home')}}" type="button" class="btn btn-success">Back</a>
                    </div>
                </div>

            @endif

        </div>

        </div>

    @endsection
