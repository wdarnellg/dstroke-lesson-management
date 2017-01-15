@extends('layouts.accounts')

@section('sidebar-left')
    <div class="col-md-2 col-sm-2">
        <h3 style="padding-top: 30px; color:#f4be33;">Used Hours</h3>
        <ul class="list-group" style="">
            <li class="list-group-item" style="color:#f4be33; background-color: #840000; border-color: #f9f8de;">
               @foreach($lessonhours->players as $player)
               <h6>Name:</h6>
               <h4> {{ $player->getFullName($player->id) }}</h4>
                @endforeach
            </li>
        </ul>
        
    </div>
@endsection

@section('content')
    <div class="col-sm-6 col-md-6 col-md-push-3">
        @include('includes.info-box')
        <a href="https://dstroketennis.youcanbook.me/" data-ycbm-modal="true"><img src="https://youcanbook.me/resources/pics/ycbm-button.png" style="padding-top: 30px; border-style:none;"/><br><span style="color:840000;">Setup a Lesson/Workout Time</span></a>
        
        <h3 style="color:#840000;">Package Details for: {{ $lessonhours->packages->name }}<br> Signed up: {{ $lessonhours->signup_date->format('m-d-Y') }}</h3>
        
        <ul class="list-group">
            @if(count($lessonhours->hoursused) == 0)
                <li class="list-group-item">
                    No Hours Used
                </li>
                @else
                <li class="list-group-item card-inverse" style="color:#f4be33; background-color: #840000; border-color: #f9f8de;">
                    <h4>Hours Used: {{ $lessonhours->hoursused->sum('numberofhours') }}</h4>
                   <h4>Hours Remaining: {{ $lessonhours->packages->numberofhours - $lessonhours->hoursused->sum('numberofhours')  }}</h4>
                </li>
                    @foreach($lessonhours->hoursused as $hour)
                    <li class="list-group-item card-inverse"  style="color:#840000; background-color: #f7d274; border-color: #ccba6c;">
                       Lesson Date:  <strong>{{ $hour->date_time->format('D-M-d-Y') }}</strong><br>
                        Hours in lesson: {{ $hour->numberofhours }}<br>
                        Comments:<br>
                        <strong>{{ $hour->comments }}</strong>
                    </li>
                    @endforeach
            @endif
        </ul>
    </div>
@endsection

@section('sidebar-right')
    <div class="col-md-2 ">
        <image class="img-rounded img-responsive center-block" style="padding:30px" src="{{ URL::asset('/img/hours.jpeg') }}" alt="Lesson Hours"></image>
    </div>
@endsection