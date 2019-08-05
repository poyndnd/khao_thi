@extends('layouts.app')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div>
                        <p>Bạn đã tạo <a href="{{ url('questions') }}"> {{ $count_question }} câu hỏi</a></p>
                    </div>

                    <div>
                        <p>Bạn đã tạo <a href="{{ url('tests') }}"> {{ $count_test }} bài test</a></p>
                    </div>

                    <div>
                        <p>Bạn đã làm <a href="{{ url('examCompleted') }}">{{ $count_exam }} bài test</a></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
