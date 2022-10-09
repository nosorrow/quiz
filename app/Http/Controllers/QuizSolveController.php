<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\QuestionOption;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizSolveController extends Controller
{
    public function showResult()
    {
        return view('quizzes-solve-result');
    }

    public function solve(Request $request, $id)
    {

//        "ans" => [▼
//                9 => "5"
//                17 => "29"
//                18 => "31"
//              ];

        $correct = 0;
        $wrong = 0;

        $answers = $request->input('ans');
        $total = count($answers);

        foreach ($answers as $key=>$answer) {

            $options = QuestionOption::find($answer);

            if((int) $options->correct === 1){
                $correct++;
            } else {
                $wrong ++;
            }

        }

        $message = "Резултатът от теста е:<br> $correct верни отговора <br> $wrong грешни отговора<br> от общо $total";

        $history = History::create([
            'user_id'=>$request->user()->id,
            'quiz_id'=>$id,
            'total'=>$total,
            'score'=>$correct
        ]);

        return redirect()->route('quiz.result')
            ->with('message',
                $message
            );

    }

    public function history($id)
    {
        $query = "
            SELECT users.name as user_name, histories.total, histories.score,
                histories.created_at, quizzes.title 
                FROM users JOIN histories 
                ON histories.user_id = users.id
                JOIN quizzes ON histories.quiz_id = quizzes.id
                WHERE quizzes.id = ?;";

        $quizzes = DB::select($query, [$id]);//->get();

        return view('quizzes-history', [
           'quizzes'=>$quizzes
        ]);
    }
}
