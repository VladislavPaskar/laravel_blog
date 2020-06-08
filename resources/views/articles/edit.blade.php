@extends('layouts.app')

@section('content')
    {{ Form::open(array('url' => '/articles/'.$article->id, 'method' => 'PUT', 'class'=>'mt-4')) }}
        @csrf
        <div class="form-group">
            <label for="name">Article Name:</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter the name of the article" value="{{$article->name}}"required>
        </div>
        <div class="form-group">
            <label for="content">Article content:</label>
            <textarea name="content" class="form-control" id="content" rows="6" required>{{$article->content}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save the article</button>
    {{ Form::close() }}
@endsection
