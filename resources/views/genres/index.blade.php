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
                        <a href="#" data-toggle="modal" data-target="#editModal-{{ $genre->id }}">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> /
                        <a href="#" data-toggle="modal" data-target="#deleteModal-{{ $genre->id }}">Delete <i class="fa fa-times" aria-hidden="true"></i></a>
                    </td>

                    <div class="modal" id="deleteModal-{{ $genre->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Delete</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure want to delete "{{ $genre->name }}"?</p>

                                        <form action="/genres/{{ $genre->id }}" method="POST">
                                            @method('DELETE')
                                                <label for="name">ID: {{ $genre->id }}</label><br>
                                                <label for="name">Name: {{ $genre->name }}</label>
                                                <hr>
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-block">Delete</button>
                                            <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="modal" id="editModal-{{ $genre->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/genres/{{ $genre->id }}" method="POST">
                                            @method('PATCH')
                                            <div class="form-group">
                                                <label for="name">ID: </label>
                                                <input type="text" name="name" class="form-control" value="{{ $genre->id }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Name: </label>
                                                <input type="text" name="name" class="form-control" value="{{ $genre->name }}">
                                            </div>
                                            <hr>
                                            @csrf
                                            <button type="submit" class="btn btn-primary btn-block">Save</button>
                                            <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

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

@yield('edit_modal')

@endsection
