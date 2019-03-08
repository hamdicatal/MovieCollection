@extends('layout')
@section('title', 'Add Movie')
@section('content')

<h4 class="card-title">Add Movie</h4>
<p class="card-text">Add new movie to collection...</p>

@if ($errors->first())
    <div class="alert alert-warning alert-dismissible mt-2">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Warning!</strong> {{ $errors->first() }}
    </div>
@endif

<form action="/movies" method="post" enctype="multipart/form-data">

    @include('movies/form')

    <button type="submit" name="" id="" class="btn btn-success btn-block mt-2">Add Movie to Collection</button>
</form>
@endsection

@section('custom_scripts')

<script src="{{ URL::asset('js/movies.js') }}"></script>
@endsection

@section('custom_styles')

<link rel="stylesheet" href="{{ URL::asset('css/movies.css') }}">
@endsection
