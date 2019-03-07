@extends('layout')

@section('title', 'Movies')

@section('content')

    <h4 class="card-title">Movies <a class="btn btn-success btn-sm" style="float:right" href="movies/create">New Movie</a></h4>
    <p class="card-text">Show all movies, edit, add...</p>

    <table class="table">
            <thead>
              <tr>
                <th>Poster</th>
                <th>Title</th>
                <th>Release Year</th>
                <th>Genre</th>
                <th>Director</th>
                <th>Operations</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                     <tr>
                         <td><img src="{{ $movie->poster }}" width="70px"></td>
                        <td>{{ $movie->title }} </td>
                        <td>{{ $movie->year }}</td>
                        <td>{{ $movie->genre->name }}</td>
                        <td>{{ $movie->director }}</td>
                        <td>Details - Edit - Delete</td>
                      </tr>
                @endforeach
            </tbody>
          </table>

@endsection
