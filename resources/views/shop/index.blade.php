@extends('layouts.shopmaster')

@section('title')
    D`Stroke Tennis Packages
@endsection

@section('content')
    @if(Session::has('success'))
      <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-.3">
          <div id="charge-message" class="alert alert-success">
            {{ Session::get('success') }}
          </div>
        </div>
      </div>
      @endif
@foreach($packages->chunk(3) as $packageChunk)
  <div class="row">
    @foreach($packageChunk as $package)
      <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="{{ $package->imagepath }}" alt="One of D products" class="img-responsive">
      <div class="caption">
        <h4>{{ $package->title }}</h4>
        <p class="description">{{ $package->type }} </p>
        <p class="hours">Hours: {{ $package->numberofhours }}</p>
          <div class="clearfix">
              <p class="pull-left cost">${{ $package->cost }}</p>
              <a href="{{ route('package.addToCart', ['id' => $package->id]) }}" class="btn btn-success pull-right" role="button">Add to cart</a>
          </div>
      </div>
    </div>
  </div>
    @endforeach

</div>
@endforeach
@endsection