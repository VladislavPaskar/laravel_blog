@extends('layouts.app')

@section('content')
    <h2 class="mt-4">{{$article->name}}</h2>
    <p id="content">{{$article->content}}</p>
@endsection
