@extends('layout')

@section('title', 'Genres')

@section('content')

    <h4 class="card-title">Genres <a class="btn btn-success btn-sm" style="float:right" href="movies/create">New Movie</a></h4>
    <p class="card-text">Show all genres, edit, add...</p>

    <table class="table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Movie Count</th>
                <th>Operations</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($genres as $genre)
                     <tr>
                        <td>{{ $genre->name }} </td>
                        <td>Details - Edit - Delete</td>
                      </tr>
                @endforeach
            </tbody>
          </table>

@endsection
