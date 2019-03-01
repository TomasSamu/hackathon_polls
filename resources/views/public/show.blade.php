@extends('layouts.app')

@section('content')
    <h2>{{ $question->title }}</h2>
    <p>{{ $question->text }}</p>
    @guest
        <h2>You need to Sign In to Vote!</h2>
    @else
        <ul>
            <li><a href="{{ action('PublicController@show', $question->id) }}">Read Question</a></li>
            <li><a href="#">Vote</a></li>
            <li><a href="#">Add Option</a></li>
        </ul>
    @endguest
@endsection