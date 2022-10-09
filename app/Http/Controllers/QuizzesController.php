<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class QuizzesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('quizzes', [
           'quizzes'=>Quiz::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        if(!Gate::any(['isAdmin', 'isManager'])){
            abort(403);
        }
        return view('quiz-create');
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

        $validator = $request->validate([
            'title'=>'required',
        ]);

       $quiz =  Quiz::create([
          'title'=> $request->input('title'),
          'user_id'=>Auth::user()->id,
       ]);

       return redirect()->route('quizzes.edit', ['quiz'=>$quiz->id]);
    }

    /**
     * Display the specified resource.
     ** @param  int  $id
     */
    public function show($id)
    {
        $quiz = Quiz::find($id);

        return view('quizzes-show', [
            'quiz'=>$quiz,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        if(!Gate::any(['isAdmin', 'isManager'])){
            abort(403);
        }

        $quiz = Quiz::find($id);
        return view('quizzes-edit', [
            'quiz'=>$quiz,
        ]);
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
     */
    public function destroy($id)
    {
        if (!Gate::any(['isAdmin', 'isManager'])) {
            abort(403);
        }

        $quiz = Quiz::find($id);

        $quiz->delete();

        return redirect()->route('quizzes.index');

    }
}
