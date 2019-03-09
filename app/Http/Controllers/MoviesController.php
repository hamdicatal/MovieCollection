<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Genre;
use App\Cast;
use App\Lang;

use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function index()
    {
        $movies = Movie::all();

        return view('movies/index', compact('movies'));
    }

    public function create()
    {
        $genres = Genre::all();
        $casts = Cast::all();
        $langs = Lang::all();

        return view('movies/create', compact('genres', 'casts', 'langs'));
    }

    public function store(Request $request)
    {
        // save movie to DB
        $validate = $this->validateRequest();
        $movie = Movie::create($validate);

        // upload and store movie poster
        if ($request->hasFile('poster')) {
            $imageName = request()->title.time().'.'.request()->poster->getClientOriginalExtension();
            request()->poster->move(public_path('posters'), $imageName);
            $movie->poster = 'posters/'.$imageName;
            $movie->save();
        }

        // add langs, genres to pivot tables
        $langs = Lang::find($request->langs);
        $casts = Cast::find($request->casts);
        $movie->langs()->attach($langs);
        $movie->casts()->attach($casts);

        return redirect('/movies');
    }

    //for demo purpose
    public function demo(){
        $genres = Genre::all();
        $casts = Cast::all();
        $langs = Lang::all();

        return view('movies/demo', compact('genres', 'casts', 'langs'));
    }

    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        $casts = Cast::all();
        $langs = Lang::all();

        $casts = $casts->diff($movie->casts);
        $langs = $langs->diff($movie->langs);

        return view('movies/edit', compact('movie', 'genres', 'casts', 'langs'));
    }

    public function update(Request $request, Movie $movie)
    {
        // upload and store movie poster
        if ($request->hasFile('poster')) {

            $imageName = request()->title.time().'.'.request()->poster->getClientOriginalExtension();
            request()->poster->move(public_path('posters'), $imageName);
            $movie->poster = 'posters/'.$imageName;
        }

        $movie->update($this->validateRequest());

        // add langs, genres to pivot tables
        $movie->langs()->detach();
        $movie->casts()->detach();
        $langs = Lang::find($request->langs);
        $casts = Cast::find($request->casts);
        $movie->langs()->attach($langs);
        $movie->casts()->attach($casts);

        return redirect('movies/' . $movie->id);
    }

    public function destroy(Movie $movie)
    {
        $movie->casts()->detach();
        $movie->langs()->detach();
        $movie->delete();

        return redirect('movies');
    }

    private function validateRequest(){
        return request()->validate([
            'title' => 'required',
            'year' => 'required',
            'director' => 'required',
            'genre_id' => 'required',
            'description' => 'required'
        ]);
    }
}
