@extends('layouts.app')

@section('content')
    <form action="/articles" method="POST" class="mt-4">
        @csrf
        <div class="form-group">
            <label for="name">Article Name:</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter the name of the article" required>
        </div>
        <div class="form-group">
            <label for="content">Article content:</label>
            <textarea name="content" class="form-control" id="content" rows="6" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save the article</button>
    </form>
@endsection
