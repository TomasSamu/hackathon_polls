@extends('layouts.app')

@section('content')
    <h2>{{ $question->title }}</h2>
    <p>{{ $question->text }}</p>
    @guest
        <h2>You need to Sign In to Vote!</h2>
    @else
        <ul>
           
            <li><a href="#">Vote</a></li>
        <li><a href="{{action('OptionController@create', $question->id)}}">Add Option</a></li>
        </ul>
    @endguest
@endsection