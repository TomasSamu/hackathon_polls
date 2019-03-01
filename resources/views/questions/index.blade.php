@extends('layouts.app')

@section('content')
    <ul>
        <li><a href="{{ action('QuestionsController@create') }}">Create</a></li>
    </ul>

    <ul>
        @foreach ($questions as $question)
            <li>{{ $question->title }}</li>
            <li>{{ $question->text }}</li>
            <li><a href="{{ action('QuestionsController@edit', $question->id) }}">EDIT</a></li>
            <li>
                <form action="{{ action('QuestionsController@destroy', $question->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" name="DELETE" value="DELETE">
                </form>
            </li>
            <br>
        @endforeach
    </ul>
@endsection