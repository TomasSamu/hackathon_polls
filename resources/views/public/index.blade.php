@extends('layouts.app')

@section('content')
    <ul>
        <li><a href="{{ action('QuestionsController@create') }}">Create</a></li>
    </ul>

    <ul>
        @foreach ($questions as $question)
            <li>{{ $question->title }}</li>
            <br>
        @endforeach
    </ul>
@endsection