@extends('admin.layout.admin')

@section('title')
    D`Stroke Tennis
@endsection

@section('content')

<div class="row">
    
    <div class="col-md-8">
@include('includes.info-box')
                <div class="row">
                    <h4><a class="pull-right" href="/users/{{ $players->users_id }}">Family</a></h4><br>
                    <h4><a class="pull-right" href="/players">Player List</a></h4>
                    
                    <h4>Player Profile</h4>
                </div>
            <section> 
            
            <div class="card card-inverse text-xs-center" style="background-color: #4286f4; border-color: #b5cbdd;">
                
                <div class="card-block">
                   <blockquote class="card-blockquote">
                    <ul class="list-group">
                        <li class="list-group-item">
                          <h3>{{ $players->getFullName($players->id) }}</h3>  
                            {{ $players->gender }}<br>
                            <a href="/players/{{ $players->id }}/playeredit" class="btn btn-default btn- pull-right">
                                       <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 
                                       Edit {{ $players->getFullName($players->id) }}</a>
                           Birthdate: {{ $players->birthdate->format('m-d-Y') }}<br>
                           
                           Family: {{ $players->users->famname }}<br>
                           <hr>

                            <div class="card card-inverse text-xs-center" style="background-color: #abdef2; border-color: #8971e8;">
                                <div class="card-block">
                                   <blockquote class="card-blockquote">                  
                                        <ul class="list-group">
                                            @if(count($players->lessonhours) == 0)
                                                <li class="list-group-item">
                                                    No Lesson Records
                                                </li>
                                                @else
                                                
                                                    @foreach($players->lessonhours as $hours)
                                                     
                                                    <li class="list-group-item card-inverse"  style="background-color: #f9f8de; border-color: #ccba6c;">
                                                        <a href="/lessonhours/{{ $hours->id }}">
                                                        Sign Up Date:<br>
                                                        {{ $hours->signup_date->format('m-d-Y') }}<br>
                                                        
                                                        <p class="pull-right">
                                                            Hours Left: {{ $hours->packages->numberofhours - $hours->hoursused->sum('numberofhours') }}
                                                        </a>
                                                          
                                                        </p>
                                                        Lesson Package Type:<br>
                                                        {{ $hours->packages->name }}<br>
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
            
    </section>
    </div>
    
    <div class="col-md-3 push-md-1">
           {!! Form::open(['action' => ['AdminController@storeLessonHours', $players->id]]) !!}
        <div class="form-group">
            {!! Form::label('players', 'Player(s):') !!}
            {!! Form::select('players[]', $selectPlayers, null, ['class' => 'form-control', 'multiple']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('signup_date', 'Signup Date:') !!}
            {!! Form::text('signup_date', null, ['class' => 'form-control', 'id' => 'datepicker']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('packages_id', 'Lesson Package:') !!}
            {!! Form::select('packages_id', $packages, null, ['class' => 'form-control', 'placeholder' => 'Choose Package']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::submit('Signup', ['class' => 'btn btn-default form-control']) !!}
        </div>
    
    {!! Form::close() !!}     
    </div>
    
</div>

@endsection

@section('scripts')
<script type="text/javascript" src="/src/js/script.js"></script>
@endsection