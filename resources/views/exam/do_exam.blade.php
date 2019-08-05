@extends('layouts.app')

@section('content')
    <div class="pannel pannel-default">
        <div class="pannel-heading text-center">
            <h3>{{ $test->name }}</h3>
        </div>
        <p id="countdown" class="text-center"></p>
        <div class="pannel-body row">
            {!! Form::open(['method' => 'POST', 'route' => ['exam.store', $test->id], 'id' => 'form']) !!}
                 @foreach ($questions as $question)
                    <div class="col-md-12">
                        <p>Câu {{ ++$i }}:</p>
                        <p>{{ $question->content }}</p>
                        {!! Form::label('answer[]', 'Đáp án: ', []) !!}
                        {!! Form::text('answer[]', null, []) !!}

                        {{-- {!! Form::label('question_id[]','Question ID:' , ['class' => 'hidden']) !!}
                        {!! Form::text('question_id[]', $question->id, ['class' => 'hidden']) !!} --}}
                        {!! Form::hidden('question_id[]', $question->id, []) !!}
                    </div>
                @endforeach
                <div class="col-md-12 text-center">
                    {!! Form::submit(trans('Nộp bài'), ['class' => 'btn btn-danger']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    <script>
        window.onload= function countdown(){
            var time = {{ $test->time }};

            var distance = time * 60  ;
            var x = setInterval(function(){
            distance = distance - 1;
            var minutes = Math.floor(distance/60);
            var seconds = Math.floor(distance)%60;
            document.getElementById("countdown").innerHTML = minutes + "Phút " + seconds + "Giây ";
            if (distance < 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "Thời gian đếm ngược đã kết thúc";
            document.getElementById("form").submit();
            } 
        }, 1000);
}
    </script>
@endsection