@extends('layout')
@section('title', 'Search Movies')
@section('content')

<h4 class="card-title">Search Movies </h4>
<p class="card-text">Search and find movies...</p>

<form class="mb-3" action="{{ route('movies.find') }}" method="post">
    <div class="row">
        <div class="col-sm-7">
            <div class="form-group">
                <input type="text" class="form-control" name="search" placeholder="Search movie here...">
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <select class="form-control" name="filter">
                              <option value="title">Title</option>
                              <option value="cast">Cast</option>
                              <option value="genre">Genre</option>
                          </select>
            </div>
        </div>
        <div class="col-sm-2">
            @csrf
            <button type="submit" class="btn btn-primary btn-block">Search</button>
        </div>
    </div>
</form>

@if ($search)
    <p>Search results for "{{ $search }}"</p>
@endif

@if (count($movies) < 1)
    <p>Movies not found for "{{ $search }}". Try to search again...</p>
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
