<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;

class GenresController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('auth.admin')->only(['destroy', 'edit', 'update']);
    }

    public function index()
    {
        $genres = Genre::all();
        return view('genres/index', compact('genres'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Genre::create(['name' => $request->name]);
        return redirect('genres');
    }

    public function show(Genre $genre)
    {
        //
    }

    public function edit(Genre $genre)
    {
        //
    }

    public function update(Request $request, Genre $genre)
    {
        $genre->update($this->validateRequest());
        return redirect('genres');
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect('genres');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required'
        ]);
    }
}
