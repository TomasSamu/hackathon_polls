@extends('layouts.app')

@section('content')
<form method="post" action="{{action('QuestionsController@update', $question->id)}}">
    @method('PATCH')
    @csrf
    <div class="form-group" >
        <label for="title">Question Title</label>
    <input type="text" name="title" class="form-control" value="{{ $question->title }}" placeholder="Question title">
    </div>
    <div class="form-group">
        <label for="text">Question Description</label>
        <input type="text" name="text" class="form-control" value="{{ $question->text }}" placeholder="Question Description">
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
</form>
@endsection