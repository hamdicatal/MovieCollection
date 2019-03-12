<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Genre;
use App\Cast;
use App\Lang;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

// for creating empty collection(used is search function)
use Illuminate\Database\Eloquent\Collection;

class MoviesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

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

        return redirect('/movies')->with('message', 'Movie successfully added to collection.');
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
            // delete old poster image from disk
            if(File::exists(public_path($movie->poster))) {
                File::delete(public_path($movie->poster));
            }

            // save new image to disk
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

        return redirect('movies/' . $movie->id)->with('message', 'Movie details successfully updated.');
    }

    public function destroy(Movie $movie)
    {
        $movie->casts()->detach();
        $movie->langs()->detach();
        $movie->delete();

        return redirect('movies')->with('message', 'Movie successfully deleted from collection.');
    }

    public function search(){
        $movies = Movie::all();
        $search = '';
        return view('movies/search', compact('movies', 'search'));
    }

    public function find(Request $request){
        $movies = Movie::all();
        $filter = $request->filter;
        $search = $request->search;

        if($filter == 'title') {
            $movies = Movie::where($filter, 'like', '%'.$search.'%')->get();
        }

        if($filter == 'cast') {
            $casts = Cast::where('name', 'like', '%'.$search.'%')->get();

            if(count($casts) > 0) {
                $movies = new Collection;
                foreach($casts as $cast) {
                    $movies = $movies->merge($cast->movies);
                }
            }

            else    $movies = [];
        }

        if($filter == 'genre') {
            $genres = Genre::where('name', 'like', '%'.$search.'%')->get();

            if(count($genres) > 0){
                $movies = new Collection;
                foreach ($genres as $genre) {
                    $movies = $movies->merge($genre->movies);
                }
            }

            else $movies = [];
        }

        return view('movies/search', compact('movies', 'search'));
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
