@extends('layouts.app')

@section('content')
    <ul>
        <li><a href="{{ action('QuestionsController@create') }}">Create</a></li>
    </ul>
@endsection