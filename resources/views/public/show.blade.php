@extends('layouts.app')

@section('content')
    <h2>{{ $question->title }}</h2>
    <p>{{ $question->text }}</p>
@endsection