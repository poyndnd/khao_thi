@extends('layouts.app')
   
@section('content')
    <div class="col-lg-12 margin-tb">
        <div class="text-center">
            <h2>Edit Test</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('tests.index') }}"> Back</a>
        </div>
    </div>
   {!! Form::open(['method' => 'PUT', 'route' => ['tests.update', $test->id]]) !!}
   <div class="row">
   	<div class="col-md-6 form-group">
        {!! Form::label('name', 'Name: ', ['class' => 'control-label']) !!}
        {!! Form::text('name', $test->name, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
    </div>

	<div class="col-md-6 form-group">
        {!! Form::label('time', 'Time(min): ', ['class' => 'control-label']) !!}
        {!! Form::text('time', $test->time, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
    </div>
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
					@if(in_array($question->id, $question_checked))
						<td>{!! Form::checkbox('question_id[]', $question->id, true, []) !!}</td>
					@else
						<td>{!! Form::checkbox('question_id[]', $question->id, false, []) !!}</td>
					@endif       	
            	<td>{{ $question->type }}</td>
            	<td>{{ $question->point }}</td>
            	<td>{{ $question->content }}</td>
        	</tr>
        @endforeach
    </table>
    <div class="col-md-12 text-center">
        {!! Form::submit('Update', ['class' => 'btn btn-danger']) !!}
    </div>
    {!! Form::close() !!}
@endsection