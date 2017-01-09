@extends('layouts.accounts')

@section('sidebar-left')
<div class="col-md-2 col-sm-2" style="padding-top: 30px">
    <image class="img-rounded img-responsive center-block" src="{{ URL::asset('/img/LessonPackages.jpg') }}" alt="Lesson Packages">
</div>
@endsection

@section('content')
@include('includes.info-box')
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-6">
    @foreach($players as $player)
           <h4>Packages</h4>
         <div class="card card-inverse text-xs-left" style="background-color: #abdef2; border-color: #8971e8;">
        <div class="card-block">
                        
            <ul class="list-group">
                @if(count($player->lessonhours) == 0)
                    <li class="list-group-item">
                        No Lesson Records
                    </li>
            </ul>
                    @else
                    <table class="table table-striped card-inverse"  style="background-color: #f9f8de; border-color: #ccba6c;">
                        <thead>
                            <tr>
                                <th>Signup Date</th>
                                <th>Package</th>
                                <th>Hours Left</th>
                            </tr>
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
<div class="col-md-2 col-sm-2col-xs-2">
    <h4>Player Profile</h4>
        <ul class="list-group">
            <li class="list-group-item">
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