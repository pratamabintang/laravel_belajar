<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\genres;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
    }
    
    public function index()
    {
        $data = genres::all();
        return view('genre.show', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genre.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        genres::create([
    		'name' => $request->name
    	]);
 
    	return redirect('genre');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $genre = genres::findOrFail($id);
        $films = $genre->films;
        return view('genre.detail', compact('genre', 'films'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = genres::find($id);
        return view('genre.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $data = genres::find($id);
        $data->name = $request->name;
        $data->update();
        return redirect('/genre');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = genres::find($id);
        $data->delete();
        return redirect('/genre');
    }
}
