@extends('layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List Exams</h2>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Time</th>

            <th width="280px">Action</th>
        </tr>
        @foreach ($tests as $test)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $test->name }}</td>
            <td>{{ $test->time }}</td>

            <td>
                <a class="btn btn-info" href="{{ url('exam/do/'.$test->id) }}">Do Exam</a>
            </td>
        </tr>
        @endforeach
    </table>
      
@endsection