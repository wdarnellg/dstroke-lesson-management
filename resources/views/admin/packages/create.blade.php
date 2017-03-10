@extends('admin.layout.admin')

@section('content')

    <h3>Add Package</h3>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::open(['route' => 'package.store', 'method' => 'POST', 'files' => true, 'data-parsley-validate'=>'']) !!}

            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', null, array('class' => 'form-control','required'=>'')) }}
            </div>

            <div class="form-group">
                {{ Form::label('type', 'Type') }}
                {{ Form::text('type', null, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('cost', 'Cost') }}
                {{ Form::text('cost', null, array('class' => 'form-control')) }}
            </div>
            
            <div class="form-group">
                {{ Form::label('numberofhours', 'Number of Hours') }}
                {{ Form::text('numberofhours', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('category_id', 'Categories') }}
                {{ Form::select('category_id', $categories, null, ['class' => 'form-control','placeholder'=>'Select Category']) }}
            </div>

            <div class="form-group">
                {{ Form::label('imagepath', 'Image') }}
                {{ Form::file('imagepath',array('class' => 'form-control')) }}
            </div>
            
            <div class="form-group">
                {{ Form::label('description', 'Description') }}
                {{ Form::textarea('description', null, array('class' => 'form-control')) }}
            </div>

             {{ Form::submit('Create', array('class' => 'btn btn-default')) }}
            {!! Form::close() !!}

        </div>
    </div>



@endsection