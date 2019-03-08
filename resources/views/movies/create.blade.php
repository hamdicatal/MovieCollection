@extends('layout')

@section('title', 'Add Movie')

@section('content')

    <h4 class="card-title">Add Movie</h4>
    <p class="card-text">Add new movie to collection...</p>
    <form action="/movies" method="post">
        <div class="card-group">
                <div class="card bg-default">
                  <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                                <label for="director">Director:</label>
                                <input type="text" name="director" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                                <label for="year">Release Year:</label>
                                <input type="number" name="year" class="form-control" min="1900" max="2099" step="1" />
                        </div>
                        <div class="form-group">
                                <label for="genre_id">Genre:</label>
                                <select class="form-control" name="genre_id" id="genre_id">
                                    <option value="">Action</option>
                                    <option value="">Drama</option>
                                    <option value="">Comedy</option>
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" rows="5" name="description" id="description"></textarea>
                        </div>
                  </div>
                </div>
                <div class="card bg-default">
                  <div class="card-body">
                    <div class="form-group">
                        <label for="casts">Cast:</label>
                        <input type="text" name="casts" class="form-control mb-2" placeholder="" aria-describedby="helpId">
                        <div>
                            <label>Jason Statham <i class="fa fa-times mr-2" aria-hidden="true"></i></label>
                            <label>Kanu Reeves <i class="fa fa-times mr-2" aria-hidden="true"></i></label>
                            <label>Jackie Chan <i class="fa fa-times mr-2" aria-hidden="true"></i></label>
                            <label>Emma Stone <i class="fa fa-times mr-2" aria-hidden="true"></i></label>
                        </div>

                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="language">Language Options:</label>
                        <div>
                            <label class="checkbox-inline mr-2"><input type="checkbox" name="langs[]" class="mr-1" value="">Turkish</label>
                            <label class="checkbox-inline mr-2"><input type="checkbox" name="langs[]" class="mr-1" value="">English</label>
                            <label class="checkbox-inline mr-2"><input type="checkbox" name="langs[]" class="mr-1" value="">French</label>
                            <label class="checkbox-inline mr-2"><input type="checkbox" name="langs[]" class="mr-1" value="">Chinese</label>
                            <label class="checkbox-inline mr-2"><input type="checkbox" name="langs[]" class="mr-1" value="">Spanish</label>

                        </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="poster">Movie Poster:</label>
                            <input type="file" accept="image/*" onchange="previewPoster(event)"><br>
                        </div>
                        <img src="{{ URL::asset('posters/default.jpeg') }}" id="img-thumbnail" class="img-thumbnail" width="150px">

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
