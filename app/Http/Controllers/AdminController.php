<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\Survey;
use App\Models\Answer;
use App\Models\Question;
use App\Models\QuestionRecipient;

class AdminController extends Controller
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
        $results = [];
        $questions = \DB::table('question')->paginate(1000);
        // $results = $results->recipient;
        foreach($questions as $question) {
            $questionData = [
                'question' => $question->question,
            ];

            $question_recipients = QuestionRecipient::where('question_id', $question->id)->get(['answer','survey_id', 'question_id']);

            if(count($question_recipients) > 0) {
                $mergeCallAndRecipient = array_merge($questionData, ['question_recipients' => $question_recipients]);
                array_push($results, $mergeCallAndRecipient);
            }


        //     // \Log::info($results);
        }

        return view('admin', ['soalan'=> $results, 'questions'=>$questions]);
        // return view('admin', ['soalan'=> $newData, 'questions'=>$questions]);
    }
}
