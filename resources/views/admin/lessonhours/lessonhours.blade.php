@extends('admin.layout.admin')

@section('title')
    D`Stroke Tennis
@endsection

@section('content')

    <div class="row">
        
        <div class="col-md-8">
    @include('includes.info-box')
        <div class="row">
            <h4>Lesson Package Details</h4>
        </div>
        
            <div class="card card-inverse text-xs-center" style="background-color: #4286f4; border-color: #b5cbdd;">
                
                <div class="card-block">
                   <blockquote class="card-blockquote">
                        <ul class="list-group">
                            <li class="list-group-item">
                                @foreach($lessonhours->players as $player)
                                   <h4> {{ $player->getFullName($player->id) }}</h4>
                                @endforeach
                                
                      <h5>Lesson Package:  {{ $lessonhours->packages->name }}</h5>  
                      <p class="pull-right">
                            <a href="/lessonhours/{{ $lessonhours->id }}/lessonhoursedit" class="btn btn-default btn- pull-right">
                           <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 
                           </a><br>
                          </p>
                      <h5>Signup Date: {{ $lessonhours->signup_date->format('m-d-Y') }}</h5>
                          
                     
                      <h4>Hours Remaining: {{ $lessonhours->packages->numberofhours - $lessonhours->hoursused->sum('numberofhours')  }}</h4>
                            </li>
                            <li class="list-group-item">
                                <div class="card card-inverse text-xs-center" style="background-color: white; border-color: #8971e8;">
                            <div class="card-block">
                               <blockquote class="card-blockquote">
                                    <ul class="list-group">
                                    @if(count($lessonhours->hoursused) == 0)
                                        <li class="list-group-item">
                                            No Hours Used
                                        </li>
                                        @else
                                            @foreach($lessonhours->hoursused as $hour)
                                            <li class="list-group-item card-inverse"  style="background-color: #f9f8de; border-color: #ccba6c;">
                                                <a href="/hoursused/{{ $hour->id }}/hoursusededit" class="btn btn-sm btn-default pull-right"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                               Lesson Date:  <h4 class="card-title">{{ $hour->date_time->format('D-M-d-Y') }}</h4>
                                               
                                                <h5 class="card-title">Hours in lesson: {{ $hour->numberofhours }}</h5> 
                                                Comments:
                                                <p class="card-text">{{ $hour->comments }}</p>
                                            </li>
                                            @endforeach
                                    @endif
                                    </ul>
                                </blockquote>
                            </div>
                    </div>
                </li>
            </ul>
        </blockquote>
                    
          </div>
          </div>
          
        
        </div>
        
        <div class="col-md-3 push-1">
            <form role="form" action="/lessonhours/{{ $lessonhours->id }}/hoursused" method="POST">
            <div class="row">
                <div class="form-group">
                <div class="input-group date">
                <label for="date_time">Lesson Date:</label>
                <input class="form-control" type="text" name="date_time" id="datepicker" placeholder="Lesson Date"/>
                <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            </div>
            <div class="form-group">
                <label for="numberofhours">Hours Used:</label>
                <select class="form-control" name="numberofhours" id="numberofhours">
                  <option selected>Hours</option>
                    <option value=".5">Half-hour</option>
                    <option value=".75">45 minutes</option>
                    <option value="1">1 hour</option>
                    <option value="1.25">An hour-15 minutes</option>
                    <option value="1.5">An hour-30 minutes</option>
                    <option value="1.75">An hour-45 minutes</option>
                    <option value="2">2 hours</option>
                </select>
            </div>
            <div class="row">
            <div class="form-group">
                <label for="comments">Comments:</label>
                <textarea class="form-control" rows="5" name="comments" id="comments">
                    
                </textarea>
            </div>
            </div>
            <input class="form-control" type="hidden" name="_token" value="{{ Session::token() }}"/>
            <input class="btn btn-default" type="submit" value="Add Hours Used"/>
        </form> 
        </div>
        
        </div>
        
        
@endsection

@section('scripts')
<script type="text/javascript" src="/src/js/script.js"></script>
@endsection