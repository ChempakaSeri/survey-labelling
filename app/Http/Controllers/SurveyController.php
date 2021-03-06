<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\Survey;
use App\Models\Answer;
use App\Models\Question;
use App\Models\QuestionRecipient;

class SurveyController extends Controller
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
        // $questions = Question::whereHas('recipient', function ($query) {
        //     $query->where('user_id', Auth::user()->id)
        //         ->where('is_answer', 0);
        // })->paginate(10);

        $questionRecipients = QuestionRecipient::where('user_id', Auth::user()->id)
            ->where('is_answer', 0)
            ->paginate(10);

        return view('survey.question')->with('questionRecipients', $questionRecipients);
    }

    public function vote(Request $request)
    {
        $this->validate($request, [
            'question' => 'required'
        ]);
        
        foreach($request->question as $question_id => $vote) {
            QuestionRecipient::where('question_id', $question_id)
                ->where('user_id' , Auth::user()->id)
                ->update([
                    'is_answer' => 1,
                    'answer'    => (string)$vote
            ]);

            Answer::create([
                'answer'        => (string)$vote,
                'user_id'       => Auth::user()->id,
                'survey_id'     => isset(Auth::user()->survey_id) ? Auth::user()->survey_id : null,
                'question_id'   => $question_id
            ]);
        }

        return redirect()->route('survey');
    }
}
