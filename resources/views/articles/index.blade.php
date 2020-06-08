@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Created By</th>
            <th scope="col">Created At</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <th scope="row">{{$article->name}}</th>
                <th scope="row">{{$article->getUserName()}}</th>
                <td>{{$article->created_at}}</td>
                <td><a type="button" href="/articles/{{$article->id}}" class="btn btn-outline-primary">View</a></td>
                <td>
                </td>
                <td></td>
            </tr>

        @endforeach
        @foreach($myArticles as $article)
            <tr>
                <th scope="row">{{$article->name}}</th>
                <th scope="row">{{$article->getUserName()}}</th>
                <td>{{$article->created_at}}</td>
                <td><a type="button" href="/articles/{{$article->id}}" class="btn btn-outline-primary">View</a></td>
                <td>
                    <a type="button" href="/articles/{{$article->id}}/edit"
                       class="btn btn-outline-secondary">Edit</a>
                </td>
                <td><a type="button" id="delete" data-id="{{$article->id}}" class="btn btn-outline-danger">Delete</a>
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>
@endsection
<script>

    window.onload = function () {
        $("#delete").on('click', function () {
            if (confirm("Do you really want to delete this article ?")) {
                let id = $(this).attr('data-id');
                $.ajax({
                    type: "DELETE",
                    url: '/articles/' + id,
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function () {
                        alert('The Article was successfully deleted!');
                        location.reload(true);
                    },
                    error: function () {
                        alert('The Article could not be deleted');
                        location.reload(true);
                    }
                });
            }
        })
    }
</script>
