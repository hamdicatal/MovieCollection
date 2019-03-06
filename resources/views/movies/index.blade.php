@extends('layout')

@section('title', 'Movies')

@section('content')

    <h4 class="card-title">Movies</h4>
    <p class="card-text">Show all movies, edit, add...</p>

    <table class="table">
            <thead>
              <tr>
                <th>Movie Name</th>
                <th>Release Date</th>
                <th>Genre</th>
                <th>Director</th>
                <th>Operations</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                     <tr>
                        <td>{{ $movie->name }} </td>
                        <td>{{ $movie->release_date }}</td>
                        <td>{{ $movie->genre }}</td>
                        <td>{{ $movie->director }}</td>
                        <td>Details - Edit - Delete</td>
                      </tr>
                @endforeach
            </tbody>
          </table>

@endsection
