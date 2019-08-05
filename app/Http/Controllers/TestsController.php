<?php

namespace App\Http\Controllers;

use App\Model\Test;
use App\Model\Question;
use App\Model\Test_has_Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $tests = Test::where('teacher_id', $id)->paginate(5);
        // dd($questions);
         
        return view('test.index', compact('tests'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::user()->id;
        $questions = Question::where('user_id', $id)->get();
        return view('test.create', compact('questions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $test = new Test();
        $test->name = $request['name'];
        $test->time = $request['time'];
        $test->teacher_id = Auth::user()->id;

        $total_point = 0;
        foreach ($request['question_id'] as $question_id) {
            $question = Question::findOrFail($question_id);
            $total_point += $question->point;
        }
        $test->total_point = $total_point;
        $test1 = Test::create($test->toArray());
        $test_has_questions = new Test_has_Question();
        $test_has_questions->test_id = $test1->id;

        foreach ($request['question_id'] as $question_id) {
            $test_has_questions->question_id = $question_id;
            Test_has_Question::create($test_has_questions->toArray());
        }

        // dd($test1->id);
        // dd($request['question_id']);
        return redirect()->route('tests.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $test = Test::findOrFail($id);
        $i=0;
        $questions = array();
        $t = Test_has_Question::where('test_id', $id)->get();
        foreach ($t as $value) {
            $question = Question::findOrFail($value->question_id);
            array_push($questions, $question);
        }
        return view('test.show', compact('questions', 'test'))->with('i');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question_checked = array();
        $t = Test_has_Question::where('test_id', $id)->get();
        foreach ($t as $value) {
            array_push($question_checked, $value->question_id);
        }
        $test = Test::findOrFail($id);
        $user_id = Auth::user()->id;
        $questions = Question::where('user_id', $user_id)->get();
        //$questions = Question::latest()->paginate(5);
        return view('test.edit', compact('questions', 'test', 'question_checked'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $t = Test_has_Question::where('test_id', $id)->get();

        foreach ($t as $value) {
            $value->delete();
        }
        $test_has_questions = new Test_has_Question();
        $test_has_questions->test_id = $id;
        foreach ($request['question_id'] as $question_id) {
            $test_has_questions->question_id = $question_id;
            Test_has_Question::create($test_has_questions->toArray());
        }
        return redirect()->route('tests.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test = Test::findOrFail($id);
        $t = Test_has_Question::where('test_id', $id)->get( );

        foreach ($t as $value) {
            $value->delete();
        }
        $test->delete();
        return redirect()->route('tests.index');
    }
}
