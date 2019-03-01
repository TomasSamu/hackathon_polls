@extends('layouts.app')

@section('content')
    <h2>{{ $question->title }}</h2>
    <p>{{ $question->text }}</p>
    @guest
        <h2>You need to Sign In to Vote!</h2>
    @else
        <ul>
            <li><a href="{{action('OptionController@create', $question->id)}}">Add Option</a></li>
        </ul>

        <form>
            <div class="form-group">
                <label>Options</label>
                <select name="option" class="form-control">
                    @foreach ($options as $option)
                        <option value="{{ $option->title }}">{{ $option->title }}</option>
                    @endforeach
                </select>
                <input type="submit" name="submit" class="btn btn-success">
            </div>
        </form>
    @endguest
@endsection