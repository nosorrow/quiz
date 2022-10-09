<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if(!Gate::any(['isAdmin', 'isManager'])){
            abort(403);
        }

        $options = $request->input('question_option');
        $correct = $request->input('correct');

        $question = Question::create([
            'question'=>$request->input('question'),
            'quiz_id'=>(int) $request->input('quiz_id')
        ]);

        $new = Question::find($question->id);

        foreach ($options as $key=>$option) {
            if($key === (int) $correct ) {
                $right = 1;
            } else {
                $right = 0;
            }
            $optArray[] = new QuestionOption(['title'=>$option, 'correct'=>$right]);
        }

        $new->options()->saveMany(
           $optArray
        );

      return redirect()->route('quizzes.edit', ['quiz'=>$request->input('quiz_id')]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
