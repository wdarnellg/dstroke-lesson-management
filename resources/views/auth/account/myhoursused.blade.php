@extends('layouts.accounts')

@section('sidebar-left')
    <div class="col-md-2 col-sm-2">
        <image class="img-rounded img-responsive center-block" style="padding:30px" src="{{ URL::asset('/img/hours.jpg') }}" alt="Lesson Hours"></image>
    </div>
@endsection

@section('content')
    <div class="col-sm-6 col-md-6 col-md-push-3">
        @include('includes.info-box')
        <h4>Package Details for: {{ $lessonhours->packages->name }}<br> Signed up: {{ $lessonhours->signup_date->format('m-d-Y') }}</h4>
        <ul class="list-group">
            @if(count($lessonhours->hoursused) == 0)
                <li class="list-group-item">
                    No Hours Used
                </li>
                @else
                <li class="list-group-item card-inverse">
                    <h4>Hours Used: {{ $lessonhours->hoursused->sum('numberofhours') }}</h4>
                   <h4>Hours Remaining: {{ $lessonhours->packages->numberofhours - $lessonhours->hoursused->sum('numberofhours')  }}</h4>
                </li>
                    @foreach($lessonhours->hoursused as $hour)
                    <li class="list-group-item card-inverse"  style="background-color: #f9f8de; border-color: #ccba6c;">
                       Lesson Date:  <strong>{{ $hour->date_time->format('D-M-d-Y') }}</strong><br>
                        Hours in lesson: {{ $hour->numberofhours }}<br>
                        Comments:<br>
                        {{ $hour->comments }}
                    </li>
                    @endforeach
            @endif
        </ul>
    </div>                    
@endsection

@section('sidebar-right')
    <div class="col-md-2 col-sm-2">
        <ul class="list-group">
            <li class="list-group-item">
               @foreach($lessonhours->players as $player)
               <h6>Name:</h6>
               <h4> {{ $player->getFullName($player->id) }}</h4>
                @endforeach
            </li>
        </ul>
    </div>
@endsection