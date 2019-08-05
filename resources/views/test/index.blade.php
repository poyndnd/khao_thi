@extends('layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List Tests</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('tests.create') }}"> Create New Test</a>
            </div>
        </div>
    </div>
   
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
                <form action="{{ route('tests.destroy',$test->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('tests.show',[$test->id]) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('tests.edit',$test->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
      
@endsection