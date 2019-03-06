<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Genre;
use App\Cast;
use App\Lang;

use Illuminate\Http\Request;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();

        return view('movies/index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();
        $casts = Cast::all();
        $langs = Lang::all();

        return view('movies/create', compact('genres', 'casts', 'langs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validateRequest();

        $movie = Movie::create($validate);

        // !!!! burası kontrol edilecek. view'den array dönmesi lazım. !!!!
        $movie->casts()->attach($request->casts);
        $movie->langs()->attach($request->langs);

        return redirect('movies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return view('movies/show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        $casts = Cast::all();
        $langs = Lang::all();

        return view('movies/edit', compact('genres', 'casts', 'langs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $movie->update($this->validateRequest());

        return redirect('movies/' . $movie->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect('movies');
    }

    private function validateRequest(){
        return request()->validate([
            'name' => 'required',
            'release_date' => 'required',
            'genre_id' => 'required',
            'media' => 'required'
        ]);
    }
}
