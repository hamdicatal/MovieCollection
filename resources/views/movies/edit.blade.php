@extends('layout')
@section('title', 'Edit Movie')
@section('content')

<h4 class="card-title">Edit Movie</h4>
<p class="card-text">Edit movie details...</p>

@if ($errors->first())
<div class="alert alert-warning alert-dismissible mt-2">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Warning!</strong> {{ $errors->first() }}
</div>
@endif

<form action="/movies/{{ $movie->id }}" method="post" enctype="multipart/form-data">
    @method('PATCH')

    <div class="card-group">
        <div class="card bg-default">
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') ?? $movie->title }}" placeholder="">
                </div>
                <div class="form-group">
                    <label for="director">Director:</label>
                    <input type="text" name="director" class="form-control" value="{{ old('director') ?? $movie->director }}" placeholder="">
                </div>
                <div class="form-group">
                    <label for="year">Release Year:</label>
                    <input type="number" name="year" class="form-control" value="{{ old('year') ?? $movie->year }}" min="1900" max="2099" step="1"
                    />
                </div>
                <div class="form-group">
                    <label for="genre_id">Genre:</label>
                    <select class="form-control" name="genre_id" id="genre_id">
                                            @foreach ($genres as $genre)
                                                @if ($movie->genre->id == $genre->id)
                                                    <option value="{{ $genre->id }}" selected>{{ $genre->name }}</option>
                                                @else
                                                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" rows="5" name="description" id="description">{{ old('description') ?? $movie->description }}</textarea>
                </div>
            </div>
        </div>
        <div class="card bg-default">
            <div class="card-body">
                <div class="form-group">
                    <label for="casts">Cast:</label>
                    <input type="text" class="form-control mb-2" id="inputCast" onkeyup="searchCast()" placeholder="Search for names..">

                    <ul class="nav list-group" id="allCasts">
                        @foreach ($casts as $cast)
                        <li class="list-group-item" value="{{ $cast->id }}">{{ $cast->name }}</li>
                        @endforeach
                    </ul>

                    <div id="addedCast">
                        @foreach ($movie->casts as $cast)
                        <label><input type="hidden" name="casts[]" value="{{ $cast->id }}">{{ $cast->name }} <i class="fa fa-times mr-2" aria-hidden="true"></i></label>
                        @endforeach
                    </div>

                </div>
                <hr>
                <div class="form-group">
                    <label for="language">Language Options:</label>
                    <div>
                        @foreach ($movie->langs as $lang)
                        <label class="checkbox-inline mr-2"><input type="checkbox" name="langs[]" class="mr-1" value="{{ $lang->id }}" checked>{{ $lang->name }}</label>
                        @endforeach
                        @foreach ($langs as $lang)
                        <label class="checkbox-inline mr-2"><input type="checkbox" name="langs[]" class="mr-1" value="{{ $lang->id }}">{{ $lang->name }}</label>
                        @endforeach
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="poster">Movie Poster:</label>
                    <input type="file" id="poster" name="poster" class="form-control" accept="image/*" onchange="previewPoster(event)">
                    <br>
                </div>
                <img src="{{ URL::asset($movie->poster) }}" id="img-thumbnail" class="img-thumbnail" width="150px">

            </div>
        </div>
    </div>

    @csrf


    <button type="submit" name="" id="" class="btn btn-success btn-block mt-2">Add Movie to Collection</button>
</form>
@endsection

@section('custom_scripts')

<script src="{{ URL::asset('js/movies.js') }}"></script>
@endsection

@section('custom_styles')

<link rel="stylesheet" href="{{ URL::asset('css/movies.css') }}">
@endsection
