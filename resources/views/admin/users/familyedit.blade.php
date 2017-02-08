@extends('admin.layout.admin')

@section('title')
    Edit Family
@endsection

@section('content')
    <div class="row">
    <div class="col-md-6">
@include('includes.info-box')
        <section>
            <h4>D`Stroke Tennis Administrator</h4>
            <h5><a href="/users/{{ $families->id }}">Family Profile</a></h5>
            <article>
             
               <div class="col-md-4">
         <form role="form" action="/users/{{ $families->id }}" method="post">
                 {{ method_field('PATCH') }}
            <div class="row">
            <div class="form-group">
                <label for="famname">User Name:</label>
                <input class="form-control" type="text" name="familyname" id="familyname" value="{{ $families->familyname }}"/>
            </div>
            </div>
            <div class="row">
            <div class="form-group">
                 <div class="row">
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input class="form-control" type="tel" name="phone" id="phone" value="{{ $families->phone }}"/>
            </div>
                
                <!--<label for="email">User Email:</label>-->
                <input class="form-control" type="hidden" name="email" id="email" value="{{ $families->email }}"/>
            </div>
            </div>
            <div class="row">
            <div class="form-group">
                <!--<label for="password">Password:</label>-->
                <input class="form-control" type="hidden" name="password" id="password" value="{{ $families->password }}"/>
            </div>
            </div>
           
            </div>
            <div class="row">
                <button type="submit" class="btn btn-default">Update Family</button>
                <input class="form-control" type="hidden" name="_token" value="{{ Session::token() }}"/>
            </div>
            </div>
        </form>  
            </article>
        </section>
    </div>
    </div>
    
@endsection