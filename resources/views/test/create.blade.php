@extends('layouts.app')
  
@section('content')
   <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Test</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('tests.index') }}"> Back</a>
        </div>
    </div>
    {!! Form::open(['method' => 'POST', 'route' => ['tests.store']]) !!}
    <div class="col-xs-6 form-group">
        {!! Form::label('name', 'Name: ', ['class' => 'control-label']) !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
    </div>

	<div class="col-xs-6 form-group">
        {!! Form::label('time', 'Time(min): ', ['class' => 'control-label']) !!}
        {!! Form::text('time', null, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
    </div>

    <table class="table table-bordered">
        <tr>
            <th></th>
            <th>Type</th>
            <th>Point</th>
            <th>Content</th>
        </tr>
        @foreach ($questions as $question)
        <tr>
            <td>{!! Form::checkbox('question_id[]', $question->id, []) !!}</td>
            <td>{{ $question->type }}</td>
            <td>{{ $question->point }}</td>
            <td>{{ $question->content }}</td>
        </tr>
        @endforeach
    </table>
    <div class="col-md-12 text-center">
        {!! Form::submit('Create', ['class' => 'btn btn-danger']) !!}
    </div>
    {!! Form::close() !!}
@endsection