@extends('layout')
@section('title', 'Genres')
@section('content')

<h4 class="card-title">Genres</h4>
<p class="card-text">Show all genres, edit, add...</p>

<div class="row">
    <div class="col-sm-8">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Movie Count</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($genres as $genre)
                <tr>
                    <td>{{ $genre->id }}</td>
                    <td>{{ $genre->name }}</td>
                    <td>{{ count($genre->movies) }}</td>
                    <td>
                        Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i> / Delete <i class="fa fa-times" aria-hidden="true"></i>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <form action="genres" method="POST">
                    <div class="form-group">
                        <label for="name">New Genre:</label>
                        <input type="text" name="name" id="" class="form-control">
                    </div>
                    @csrf
                    <button type="submit" class="btn btn-primary btn-block">Add</button>
                </form>
            </div>
        </div>

    </div>
</div>
</div>
</div>
@endsection
