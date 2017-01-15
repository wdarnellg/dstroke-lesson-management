@extends('layouts.accounts')

@section('sidebar-left')
<div class="col-md-2">
    <image class="img-rounded img-responsive center-block" src="{{ URL::asset('/img/users_family.jpg') }}" alt="Family Profile"></imgage>
</div>
@endsection

@section('content')
    <div class="col-md-6 col-md-push-3">
        @include('includes.info-box')
         <h3 style="color:#840000;">Family Profile</h3>
        <div class="card text-xs-center" style="color:#840000; background-color: #abdef2; border-color: #8971e8;">
            <ul class="list-group">
                <li class="list-group-item">
                    <h3>Family: {{ $families->familyname }}</h3>
                    
                   <p>{{ $families->phone }}</p> 
                   <p>{{ $families->email }}</p>
                    
                     <ul class="list-group">
                         @if(count($families->players) == 0)
                            <li class="list-group-item">
                                No members added
                            </li>
                    </ul>
                        @endif   
                        <table class="table table-striped" style="color:840000;">
                        <thead>
                            <tr>
                                <th>Family Member</th>
                                <th>Gender</th>
                                <th>Birthdate</th>
                            </tr>
                        </thead>
                        <tbody  class="card-inverse"  style="background-color: #f9f8de; border-color: #ccba6c;">
                        @foreach($families->players as $player)
                        <tr>
                            <td><a href="/mylessonhours"> {{ $player->getFullName($player->id) }}</a></td>
                            <td>{{ $player->gender }}</td>
                            <td>{{ $player->birthdate->format('m-d-Y') }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </li>
            </ul>
        </div>
    </div>
@endsection

@section('sidebar-right')
    <div class="col-md-2 col-offset-1">
        <h3 style="color:#840000;">Add a New Family Member (Player)</h3>
        <form role="form" action="/myfamilyprofile/{{ $families->id }}/players" method="POST">
            <div class="row">
            <div class="form-group">
                <label for="fname">First Name:</label>
                <input class="form-control" type="text" name="fname" id="fname" placeholder="First Name"/>
            </div>
            </div>
            <div class="row">
            <div class="form-group">
                <label for="lname">Last Name:</label>
                <input class="form-control" type="text" name="lname" id="lname" placeholder="Last Name"/>
            </div>
            </div>
            <div class="row">
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" name="gender" id="gender">
                  <option selected>Choose Gender</option>
                  <option value="Female">Female</option>
                  <option value="Male">Male</option>
                </select>
            </div>
            </div>
            <div class="row">
            <div class="form-group">
                <label for="birthdate">Birthdate:</label>
                <input class="form-control" type="text" name="birthdate" id="datepicker" placeholder="Please format m/d/yyyy"/>
            </div>
            </div>
            <input class="form-control" type="hidden" name="_token" value="{{ Session::token() }}"/>
            <button class="btn btn-default" type="submit" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Family Member</button>
        </form>
    </div>
@endsection

@section('scripts')
<script type="text/javascript" src="/src/js/script.js"></script>
@endsection