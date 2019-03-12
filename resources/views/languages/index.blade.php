@extends('layout')
@section('title', 'Languages')
@section('content')

<h4 class="card-title">Languages</h4>
<p class="card-text">Show all languages, edit, add...</p>

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
                @foreach ($langs as $lang)
                <tr>
                    <td>{{ $lang->id }}</td>
                    <td>{{ $lang->name }}</td>
                    <td>{{ count($lang->movies) }}</td>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#editModal-{{ $lang->id }}">Edit <i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="modal" data-target="#deleteModal-{{ $lang->id }}">Delete <i class="fa fa-times" aria-hidden="true"></i></a>
                    </td>

                    <div class="modal" id="deleteModal-{{ $lang->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Delete</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure want to delete "{{ $lang->name }}"?</p>

                                        <form action="{{ route('langs.destroy', ['lang' => $lang]) }}" method="POST">
                                            @method('DELETE')
                                                <label for="name">ID: {{ $lang->id }}</label><br>
                                                <label for="name">Name: {{ $lang->name }}</label>
                                                <hr>
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-block">Delete</button>
                                            <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="modal" id="editModal-{{ $lang->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('langs.update', ['lang' => $lang]) }}" method="POST">
                                            @method('PATCH')
                                            <div class="form-group">
                                                <label for="name">ID: </label>
                                                <input type="text" name="name" class="form-control" value="{{ $lang->id }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Name: </label>
                                                <input type="text" name="name" class="form-control" value="{{ $lang->name }}">
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
                <form action="{{ route('langs.store') }}" method="POST">
                    <div class="form-group">
                        <label for="name">New Language:</label>
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
