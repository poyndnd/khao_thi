<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Test;
use App\Model\Question;
use App\Model\User_has_Test;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::user()->id;
        $questions = Question::where('user_id', $id)->get();
        $count_question = count($questions);
        $tests = Test::where('teacher_id', $id)->get();
        $count_test = count($tests);
        $exam = User_has_Test::where('user_id', $id)->get();
        $count_exam = count($exam);

        return view('home', compact('count_question', 'count_test', 'count_exam'));
    }
}
