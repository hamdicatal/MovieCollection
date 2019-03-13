<?php

namespace App\Http\Controllers;

use App\Cast;
use Illuminate\Http\Request;

class CastsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('auth.admin')->only(['destroy', 'edit', 'update']);
    }

    public function index()
    {
        $casts = Cast::all();
        return view('casts/index', compact('casts'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Cast::create(['name' => $request->name]);
        return redirect('casts');
    }

    public function show(Cast $cast)
    {
        //
    }

    public function edit(Cast $cast)
    {
        //
    }

    public function update(Request $request, Cast $cast)
    {
        $cast->update($this->validateRequest());
        return redirect('casts');
    }

    public function destroy(Cast $cast)
    {
        $cast->movies()->detach();
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
