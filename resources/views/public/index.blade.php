@extends('layouts.app')

@section('content')
    <ul>
        <li><a href="{{ action('QuestionsController@create') }}">Create</a></li>
    </ul>

    <ul>
        @foreach ($questions as $question)
            <li>{{ $question->title }}</li>
            <li><a href="{{ action('PublicController@show', $question->id) }}">Read Question</a></li>
            <br>
        @endforeach
    </ul>
@endsection