@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Question</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('questions.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-md-12 form-group">
            <strong>Type:</strong>
            <p>{{ $question->type }}</p>
        </div>
            
        <div class="col-md-12 form-group">           
            <strong>Point:</strong>
            <p>{{ $question->point }}</p>
        </div>

        <div class="col-md-12 form-group">           
            <strong>Content:</strong>
            <p>{{ $question->content }}</p>
        </div>

        <div class="col-md-12 form-group">           
            <strong>Answer:</strong>
            <p>{{ $question->answer }}</p>
        </div>

    </div>

@endsection