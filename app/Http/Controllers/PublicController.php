<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Option;

class PublicController extends Controller
{
    public function index()
    {
        $questions = Question::all();

        return view('public.index', compact('questions'));
    }

    public function show(Question $question)
    {
        $options = Option::all()->where('question_id', $question->id);

        return view('public.show', compact('question', 'options'));
    }
}
