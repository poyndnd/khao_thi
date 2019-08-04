@extends('layouts.app')

@section('content')
    <div class="pannel pannel-default">
        <div class="pannel-heading text-center">
            <h3>{{ $test->name }}</h3>
        </div>
        <div class="pannel-body">
            @foreach ($questions as $question)
            <div>
                <p>Câu {{ ++$i }}:</p>
                <p>{{ $question->content }}</p>
                <p>Đáp án: {{ $question->answer }}</p>
            </div>
        @endforeach
        </div>
    </div>
    
@endsection