@extends('layouts.accounts')

@section('sidebar-left')
<div class="col-md-2">
    <h3 style="color:#840000; padding-top: 30px;">Player Profile</h3>
        <ul class="list-group">
            <li class="list-group-item" style="color:#840000; background-color: #f9f8de; border-color: #f9f8de;">
            @foreach($players as $player)
              <h3>{{ $player->getFullName($player->id) }}</h3>  
                {{ $player->gender }}<br>
               Birthdate: {{ $player->birthdate->format('m-d-Y') }}<br>
               Family: {{ $player->users->familyname }}<br>
               @endforeach
            </li>
        </ul>
</div>
@endsection

@section('content')
@include('includes.info-box')
<div class="row">
    <div class="col-md-6  col-md-push-3">
    @foreach($players as $player)
           <a href="https://dstroketennis.youcanbook.me/" data-ycbm-modal="true"><img src="https://youcanbook.me/resources/pics/ycbm-button.png" style="border-style:none; padding-top: 30px;"/><br>Setup a Lesson/Workout Time</a>
            <h3 style="color:#840000;">Packages</h3>
         <div class="card card-inverse text-xs-left" style="background-color: #abdef2; border-color: #8971e8;">
        <div class="card-block">
            <ul class="list-group">
                @if(count($player->lessonhours) == 0)
                    <li class="list-group-item">
                        No Lesson Records
                    </li>
            </ul>
                    @else
                    <table class="table table-striped card-inverse"  style="color:#840000; background-color: #f9f8de; border-color: #ccba6c;">
                        <thead>
                        <strong>
                         <tr>
                            <th>Signup Date</th>
                            <th>Package</th>
                            <th>Hours Left</th>
                          </tr>
                        </strong>
                        </thead>
                        <tbody>
                           @foreach($player->lessonhours as $hours) 
                           <tr>
                               <td>{{ $hours->signup_date->format('m/d/Y') }}</td>
                               <td>{{ $hours->packages->name }}<br>
                                   <a href="/mylessonhours/{{$hours->id}}">Package Details</a>
                                </td>
                               <td>{{ $hours->packages->numberofhours - $hours->hoursused->sum('numberofhours') }}</td>
                           </tr>
                           @endforeach
                        </tbody>
                    </table>
                    @endif
            </div>
            </div> 
     @endforeach
</div>
</div>
@endsection

@section('sidebar-right')
<div class="col-md-2">
    
    <image class="img-rounded img-responsive center-block" src="{{ URL::asset('/img/LessonPackages.jpg') }}" alt="Lesson Packages"  style="padding-top: 30px">
    
        
</div>
@endsection