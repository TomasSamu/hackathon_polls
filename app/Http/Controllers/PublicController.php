<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class PublicController extends Controller
{
    public function index()
    {
        $questions = Question::all();

        return view('public.index', compact('questions'));
    }

    public function show(Question $question)
    {
        return view('public.show', compact('question'));
    }
}
