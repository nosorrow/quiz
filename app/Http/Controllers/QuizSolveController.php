<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\QuestionOption;
use Illuminate\Http\Request;

class QuizSolveController extends Controller
{
    public function showResult()
    {
        return view('quizzes-solve-rezult');
    }

    public function solve(Request $request, $id)
    {

//        "ans" => [▼
//                9 => "5"
//                17 => "29"
//                18 => "31"
//              ];
        // Session [correct[] wrong[]


        $correct = 0;
        $wrong = 0;

        $answers = $request->input('ans');
        $total = count($answers);
//        $questionsId = array_keys((array)$answers);

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


}
