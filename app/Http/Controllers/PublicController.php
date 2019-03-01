<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Option;
use App\Vote;

class PublicController extends Controller
{
    public function index()
    {
        $questions = Question::all();

        return view('public.index', compact('questions'));
    }

    public function show(Question $question)
    {
        $options = Option::where('question_id', $question->id)->get();
        //    $results = Vote::groupBy('option_id', 'question_id')->having('question_id', '=', $question->id)->count()->toSql();
        // $results_count = Vote::where('question_id', '=', $question->id)->count();
        $votes_per_option = Option::selectRaw('`options`.*, COUNT(`votes`.`id`) AS count')
            ->rightJoin('votes', 'options.id', 'votes.option_id')
            ->where('options.question_id', '=', $question->id)
            ->groupBy('votes.option_id')
            ->orderByRaw('COUNT(`votes`.`id`) DESC')
            // ->toSql();
            ->get();
        // dd($votes_per_option);
        return view('public.show', compact('question', 'options', 'votes_per_option'));
    }
}
