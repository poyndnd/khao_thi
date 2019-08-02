@extends('layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Question</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('questions.index') }}"> Back</a>
        </div>
    </div>
</div>
{!! Form::open(['method' => 'POST', 'route' => ['questions.store']]) !!}
<div class="panel panel-default">
    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('type', 'Type', ['class' => 'control-label']) !!}
            {!! Form::text('type', null, ['class' => 'form-control', 'placeholder' => '']) !!}
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('point', 'Point', ['class' => 'control-label']) !!}
            {!! Form::text('point', null, ['class' => 'form-control', 'placeholder' => '']) !!}
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('content', 'Content', ['class' => 'control-label']) !!}
            {!! Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => '']) !!}
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 form-group">
            {!! Form::label('answer', 'Answer', ['class' => 'control-label']) !!}
            {!! Form::text('answer', null, ['class' => 'form-control', 'placeholder' => '']) !!}
        </div>
    </div>

     <div class="col-md-12 text-center">
                {!! Form::submit('Create', ['class' => 'btn btn-danger']) !!}
            </div>
</div>
{!! Form::close() !!}
@endsection