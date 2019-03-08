<?php

namespace App\Http\Controllers;

use App\Lang;
use Illuminate\Http\Request;

class LangsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $langs = Lang::all();
        return view('languages/index', compact('langs'));
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
        Lang::create(['name' => $request->name]);
        return redirect('languages');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\lang  $lang
     * @return \Illuminate\Http\Response
     */
    public function show(Lang $lang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\lang  $lang
     * @return \Illuminate\Http\Response
     */
    public function edit(Lang $lang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lang  $lang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lang $lang)
    {
        $lang->update($this->validateRequest());
        return redirect('languages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\lang  $lang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lang $lang)
    {
        $lang->delete();
        return redirect('languages');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required'
        ]);
    }
}
