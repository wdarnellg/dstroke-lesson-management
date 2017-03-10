@extends('layouts.shopmaster')

@section('title')
    Laravel shopping cart
@endsection

@section('content')

    @if(Session::has('cart'))
        <div class="row">
            <div class="col-sm-7 col-md-6 col-md-offset-3 col-sm0offset-3">
                <ul class="list-group">
                    @foreach($packages as $package)
                        <li class="list-group-item">
                            <span class="badge">{{ $package['qty'] }}</span>
                            <strong>{{ $package['item'] ['title'] }}</strong>
                            <span class="label label-success">{{ $package['cost'] }}</span>
                            <div class="btn btn-group">
                                <button class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Remove Items <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('package.reduceByOne', ['id' => $package['item']['id']]) }}">Reduce by 1</a></li>
                                    <li><a href="{{ route('package.remove', ['id' => $package['item']['id']]) }}">Reduce All</a></li>
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Total: {{ $totalCost }}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-7 col-md-6 col-md-offset-3 col-sm-offset-3">
                <a href="{{ route('checkout') }}" type="button" class="btn btn-success">Checkout</a>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-7 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h3>No Items in Cart!</h3>
            </div>
        </div>
    @endif
@endsection