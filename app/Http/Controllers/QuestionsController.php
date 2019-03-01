<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use Auth;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();

        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'title' => 'required',
            'text' => 'required' 
        ]);
        $question = new Question;
        $question->user_id = Auth::id();
        $question->title = $request->title;
        $question->text = $request->text;
        $question->save();

        return redirect(action('QuestionsController@index'))->with('success','You successfully posted a question!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        return view('questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $validator = $request->validate([
            'title' => 'required',
            'text' => 'required' 
        ]);

        $question->user_id = Auth::id();
        $question->title = $request->title;
        $question->text = $request->text;
        $question->update();

        return redirect(action('QuestionsController@index'))->with('success','You successfully updated a question!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return redirect(action('QuestionsController@index'))->with('success', "You successfully deleted question: {$question->title}!");
    }
}
