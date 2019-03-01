@extends('layouts.app')

@section('content')
<form method="post"action="{{action('QuestionsController@store')}}">
  
    @csrf

<div class="form-group" >
          <label for="title">Question Title</label>
          <input type="text" name = "title" class="form-control" placeholder="Question title">
        </div>

        <div class="form-group">
          <label for="text">Question Description</label>
          <input type="text" name = "text" class="form-control" placeholder="Question Description">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>

</form>
@endsection