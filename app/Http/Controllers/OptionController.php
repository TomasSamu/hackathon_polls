<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Option;
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
        return redirect (action('PublicController@index'));

    } 
}
