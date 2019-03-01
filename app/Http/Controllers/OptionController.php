<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Option;
use App\Vote;
use Auth;

class OptionController extends Controller
{
    public function create(Question $question)
    {

        return view('options/create', compact('question')); 
    }

     public function store(Request $request, Question $question)
    {

        $validator = $request->validate([
            'title' => 'required',
        ]);

        $option = new Option;
        $option->title = $request->title;
        $option->question_id = $question->id;
        $option->user_id = Auth::id();

        $option->save();
        return redirect (action('PublicController@index'))->with('success', 'Option added');
    } 


    public function vote(Request $request)
    {
        $vote = Vote::where('user_id', $request->question_id)
            ->where('question_id', $request->user_id)
            ->first();

        if ($vote) {
            return back()->withErrors(['Porco dio you idiot wtf are you doing']);
        }

        $vote = new Vote;
        $vote->question_id = $request->question_id;
        $vote->user_id = $request->user_id;
        $vote->option_id = $request->option;
        $vote->save();
        return redirect (action('PublicController@index'))->with('success', 'Voted');
    }
}
