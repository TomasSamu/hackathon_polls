@extends('layouts.app')

@section('content')
<form method="post" action="{{action('OptionController@store', $question->id)}}">
    @csrf
    <div class="form-group" >
        <label for="title">Option:</label>
        <input type="text" name = "title" class="form-control" placeholder="Question title">
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
@endsection