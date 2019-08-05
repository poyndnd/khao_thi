@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List Completed Exams</h2>
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
            {{-- <th>No</th> --}}
            <th>Name</th>
            <th>Time</th>
            <th>Point</th>

        </tr>
        @foreach ($list_exam as $exam)
        <tr>
            {{-- <td>{{ ++$i }}</td> --}}
            <td>{{ App\Model\Test::find($exam->test_id)->name }}</td>
            <td>{{ App\Model\Test::find($exam->test_id)->time }}</td>
            <td>{{ $exam->point }}/{{ App\Model\Test::find($exam->test_id)->total_point }}</td>
        </tr>
        @endforeach
    </table>
      
@endsection