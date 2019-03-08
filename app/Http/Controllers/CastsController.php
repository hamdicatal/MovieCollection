<?php

namespace App\Http\Controllers;

use App\Cast;
use Illuminate\Http\Request;

class CastsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $casts = Cast::all();
        return view('casts/index', compact('casts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cast::create(['name' => $request->name]);
        return redirect('casts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Genre  $cast
     * @return \Illuminate\Http\Response
     */
    public function show(Cast $cast)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Genre  $cast
     * @return \Illuminate\Http\Response
     */
    public function edit(Cast $cast)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Genre  $cast
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genre $cast)
    {
        $cast->update($this->validateRequest());
        return redirect('casts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Genre  $cast
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cast $cast)
    {
        $cast->delete();
        return redirect('casts');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required'
        ]);
    }
}
