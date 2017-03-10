@extends('layouts.main')

@section('title','package')


@section('content')

    <!-- Package listing -->
    <!-- Latest Package -->
    <div class="row">
        <div class="small-5 small-offset-1 columns">
            <div class="item-wrapper">
                <div class="img-wrapper">
                    <a href="#">
                        <img src="{{asset('img/DStrokeLogoD.png')}}"/>
                    </a>
                </div>
            </div>
        </div>
        <div class="small-6 columns">
            <div class="item-wrapper">
                <h3 class="subheader">
                    {{ $packages->name }} <br><span class="price-tag">${{ $packages->cost }}</span> 
                </h3>
                
                <div class="text-left subheader">
                    <p>
                        {{ $packages->description }}
                    </p>
                </div>
                
                <div class="row">
                    <div class="large-12 columns">
                       
                        <a href="{{route('cart.addItem',$packages->id)}}" class="button  expanded" style="background-color: #840000">Add to Cart</a>
                    </div>
                </div>
                <p class="text-left subheader">
                    <small> <a href="#">THAT DARN Web</a></small>
                </p>

            </div>
        </div>
    </div>

@endsection