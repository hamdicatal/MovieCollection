@extends('layout')
@section('title', 'Movies')
@section('content')

<h4 class="card-title">Movies <a class="btn btn-success btn-sm" style="float:right" href="movies/create"><i class="fa fa-plus" aria-hidden="true"></i> New Movie</a></h4>
<p class="card-text">Show all movies, edit, add...</p>

@if (session()->has('message'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> {{ session()->get('message') }}
</div>
@endif


<table id="movies" class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Poster</th>
            <th>Title</th>
            <th onclick="sortTable(3)">Release Year <i id="orderArrow" class="fa fa-arrow-circle-left" aria-hidden="true"></i></th>
            <th>Genre</th>
            <th>Director</th>
            <th>Operations</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($movies as $movie)
        <tr>
            <td class="center align-middle">{{ $movie->id }}</td>
            <td class="align-middle"><img src="{{ URL::asset($movie->poster) }}" width="70px"></td>
            <td class="align-middle">{{ $movie->title }} </td>
            <td class="align-middle">{{ $movie->year }}</td>
            <td class="align-middle">{{ $movie->genre->name }}</td>
            <td class="align-middle">{{ $movie->director }}</td>
            <td class="align-middle">
                <a href="movies/{{ $movie->id }}">Details <i class="fa fa-file-text-o mr-2" aria-hidden="true"></i></a>
                <a href="movies/{{ $movie->id }}/edit">Edit <i class="fa fa-pencil-square-o mr-1" aria-hidden="true"></i></a>
                <a href="movies/{{ $movie->id }}">Delete <i class="fa fa-times" aria-hidden="true"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('custom_scripts')

<script src="{{ URL::asset('js/movies.js') }}"></script>
@endsection
