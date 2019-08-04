<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Question;
use App\Model\Test_has_Question;
use App\Model\Test;
use App\Model\User_has_Test;
use Illuminate\Support\Facades\Auth;

class DoTestController extends Controller
{
    public function list()
    {
       $tests = Test::latest()->paginate(5);
        // dd($questions);
         
        return view('exam.list', compact('tests'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function do_exam($id)
    {
        $check = User_has_Test::where('test_id', $id)->where('user_id', Auth::user()->id)->exists();
        if($check == true){
            return redirect()->route('exam.list')->with('success','Bạn đã làm bài test này!!');
        } else{
            $test = Test::findOrFail($id);
            $i=0;
            $questions = array();
            $t = Test_has_Question::where('test_id', $id)->get();
            foreach ($t as $value) {
                $question = Question::findOrFail($value->question_id);
                array_push($questions, $question);
            }
            return view('exam.do_exam', compact('questions', 'test'))->with('i');
        }
    }

    public function store(Request $request, $id)
    {
        $user_has_test = new User_has_Test();
        $user_has_test->user_id = Auth::user()->id;
        $user_has_test->test_id = $id;
        $point = 0;
        $i = 0;
        foreach ($request['answer'] as $answer) {
            $question = Question::findOrFail($request['question_id'][$i]);
            if($answer == $question->answer) $point += $question->point;
            $i++;
        }
        $user_has_test->point = $point;
        User_has_Test::create($user_has_test->toArray());
        $test = Test::findOrFail($id);
        return redirect()->route('exam.list')->with('success','Bạn đã làm được '. $point. '/'. $test->total_point. 'điểm');
    }
}
