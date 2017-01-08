@extends('layouts.bsmaster')

@section('sidebar-left')
  <div class="col-sm-2 sidenav">
    <image class="img-rounded img-responsive center-block" src="{{ URL::asset('/img/DarnellBlueShirt.jpg') }}" alt="Darnell blue shirt">
    <div class="card-block">
      <p class="card-text">Since 1997 teaching tennis to people of all levels and age groups has been a labor of love and and joy.</p><p class="card-text"> Let me help you with your tennis!</p>
      
  </div>  
  </div>
  
@endsection

@section('content')
  <div class=" text-left"> 
      <h1>Welcome</h1>
       <image class="img-thumbnail img-responsive center-block" src="{{ URL::asset('/img/OnDCourtFade.png') }}" alt="D`Stroke Tennis" style="width: 100%" </image></image>
    </div>
@endsection

@section('sidebar-right')
  <div class="col-sm-2 sidenav">
      <div class="row">
        <div class="card">
      <image class="card-img-top img-rounded img-responsive center-block" src="{{ URL::asset('/img/ForehandBallToss.jpg') }}" alt="Darnell blue shirt">
      <div class="card-block">
        <h4 class="card-title">Private Training</h4>
        <p class="card-text">Some of the more intense packages available are geared toward high levels of tennis racquet and ball control.</p><p class="card-text"> Let me help you with your tennis!</p>
        <!--<a href="#" class="btn btn-default">View Lesson Packages</a>-->
      </div>
    </div>
    </div>
    <div class="row">
    <div class="card card-block">
      <h4 class="card-title">Group Lessons/Workouts</h4>
      <p class="card-text">Coming soon will be content that will explain how groups will work. There will also be content explaing how to hire DStroke Tennis Site Directing services.</p>
      <!--<a href="#" class="card-link">Groups</a><br>-->
      <!--<a href="#" class="card-link">Tournament Site Director</a>-->
    </div>
    </div>
    </div>
    @endsection


