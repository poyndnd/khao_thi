@extends('layout')

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
        <div class="col-xs-12 form-group">
            <strong>Type:</strong>
            {{ $question->type }}
        </div>

        <div class="col-xs-12 form-group">           
            <strong>Point:</strong>
            {{ $question->point }}
        </div>

        <div class="col-xs-12 form-group">           
            <strong>Content:</strong>
            {{ $question->content }}
        </div>

        <div class="col-xs-12 form-group">           
            <strong>Answer:</strong>
            {{ $question->answer }}
        </div>
    </div>
@endsection