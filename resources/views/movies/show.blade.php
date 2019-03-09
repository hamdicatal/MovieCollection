@extends('layout')
@section('title', 'Movie Details')
@section('content')

<div class="row">
    <div class="col-sm-3"><img src="{{ URL::asset($movie->poster) }}" width="200px"></div>
    <div class="col-sm-9">
        <h4 class="card-title">{{ $movie->title }} ({{ $movie->year }})
            <a class="btn btn-success btn-sm" style="float:right" href="/movies/{{ $movie->id }}/edit">
                <i class="fa fa-edit" aria-hidden="true"></i> Edit Details
            </a>
            <a class="btn btn-danger btn-sm mr-2" style="float:right" data-toggle="modal" data-target="#deleteModal" href="/movies/{{ $movie->id }}">
                <i class="fa fa-trash" aria-hidden="true"></i> Delete Movie
            </a>
        </h4>
        <p class="card-text"><strong>Genre:</strong> {{ $movie->genre->name }}<br>
            <strong>Director:</strong> {{ $movie->director }} <br>
            <strong>Cast:</strong> {{ $movie->casts->implode('name', ', ') }}<br>
            <strong>Languages:</strong> {{ $movie->langs->implode('name', ', ') }}<br>
            <strong>Description:</strong> {{ $movie->description }}</p>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete "{{ $movie->title }}"?
            </div>
            <div class="modal-footer">
                <form action="/movies/{{ $movie->id }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
