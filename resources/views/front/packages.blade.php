@extends('layouts.main')

@section('title','Lesson/Workout Packages')
@section('content')
    <!-- Packages listing -->
    <!-- Latest Packages -->
    <div class="container-fluid">
        <div class="row">
        @forelse($packages as $package)
            <div class="small-3 medium-3 large-3 columns">
                <div class="item-wrapper">
                    <div class="img-wrapper">
                        <a href="#">
                            <img src="{{asset('img/DStrokeLogoD.png')}}"/>
                        </a>
                    </div>
                    <a href="{{route('package',$package->id)}}">
                        <h3>
                            {{$package->name}}
                        </h3>
                    </a>
                    <h5>
                        ${{$package->cost}}

                    </h5>
                    <p>
                        {{$package->type}}
                    </p>
                    
                        <a href="{{route('cart.addItem',$package->id)}}" class="button expanded add-to-cart" style="background-color: #840000; color:white">
                            Add to Cart
                        </a>
                    
                </div>
            </div>

        @empty
        <h3>No packages</h3>
       @endforelse
    </div>
    </div>
    
@endsection