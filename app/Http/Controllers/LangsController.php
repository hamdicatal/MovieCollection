<?php

namespace App\Http\Controllers;

use App\Lang;
use Illuminate\Http\Request;

class LangsController extends Controller
{
    public function index()
    {
        $langs = Lang::all();
        return view('languages/index', compact('langs'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Lang::create(['name' => $request->name]);
        return redirect('languages');
    }

    public function show(Lang $lang)
    {
        //
    }

    public function edit(Lang $lang)
    {
        //
    }

    public function update(Request $request, lang $lang)
    {
        $lang->update($this->validateRequest());
        return redirect('languages');
    }

    public function destroy(Lang $lang)
    {
        $lang->movies()->detach();
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
