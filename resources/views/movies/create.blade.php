@extends('layout')

@section('title', 'Add Movie')

@section('content')

    <h4 class="card-title">Add Movie</h4>
    <p class="card-text">Add new movie to collection...</p>
    <hr>
    <form action="/movies" method="post">

            <div class="form-group">
              <label for="title">Title:</label>
              <input type="text" name="title" class="form-control" placeholder="" aria-describedby="helpId">
            </div>

            <div class="form-group">
                    <label for="year">Release Year:</label>
                    <input type="text" name="year" class="form-control" placeholder="" aria-describedby="helpId">
            </div>

            <div class="form-group">
              <label for="genre_id">Genre:</label>
              <select class="form-control" name="genre_id" id="genre_id">
                  @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                  @endforeach
                </select>
            </div>

            <div class="form-group">
                    <label for="director">Director:</label>
                    <input type="text" name="director" class="form-control" placeholder="" aria-describedby="helpId">
            </div>

            <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" rows="5" name="description" id="description"></textarea>
            </div>

            <div class="form-group">
                    <label for="poster">Movie Poster:</label>
                    <!-- <input type="file" name="poster" class="form-control-file border"> -->
                    <input type="text" name="poster" value="/posters/hobbit.jpg">
            </div>

            <div class="form-group">
                <label for="poster">Language Options:</label>

                @foreach ($langs as $lang)
                    <input type="checkbox" style="margin-left: 10px" name="langs[]" value="{{$lang->id}}"> <label>{{$lang->name}}</label>
                @endforeach
            </div>

        @csrf

        <!-- Show errors of validation -->
        <div>{{ $errors->first() }}</div>

        <button type="submit" name="" id="" class="btn btn-success">Create Movie</button>
    </form>

@endsection
