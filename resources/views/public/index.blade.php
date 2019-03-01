@extends('layouts.app')

@section('content')
    <ul>
        <li><a href="{{ action('QuestionsController@create') }}">Create</a></li>
    </ul>

    <ul>
        @foreach ($questions as $question)
            <li>{{ $question->title }}</li>
            <br>
            @guest
                <h2>You need to Sign In to Vote!</h2>
            @else
                <ul>
                    <li><a href="{{ action('PublicController@show', $question->id) }}">Read Question</a></li>
                    <li><a href="#">Vote</a></li>
                    <li><a href="#">Add Option</a></li>
                </ul>
            @endguest
        @endforeach
    </ul>
@endsection