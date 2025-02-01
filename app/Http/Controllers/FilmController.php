<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\films;
use App\Models\genres;
use App\Models\reviews;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class FilmController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = films::all();
        return view('film.show', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = genres::all();
        return view('film.add', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'summary' => 'required',
            'release_year' => 'required|max:255',
            'poster' => 'required|image|mimes:jpg,png,jpeg',
            'genre_id' => 'required',
        ]);

        $file_name = time().'.'.$request->poster->extension();

        $request->poster->move(public_path('image'), $file_name);

        films::create([
    		'title' => $request->title,
    		'summary' => $request->summary,
    		'release_year' => $request->release_year,
    		'poster' => $file_name,
    		'genre_id' => $request->genre_id,
    	]);
 
    	return redirect('/film');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = films::find($id);
        $reviews = reviews::where('film_id', $id)->get();
        $genres = genres::all();
        return view('film.details', compact('data', 'reviews', 'genres'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = films::find($id);
        $genres = genres::all();
        return view('film.edit', compact('data', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'summary' => 'required',
            'release_year' => 'required|max:255',
            'poster' => 'image|mimes:jpg,png,jpeg',
            'genre_id' => 'required',
        ]);

        $data = films::find($id);

        if($request->has('poster')){
            $path = 'image/';
            File::delete($path.$request->poster);

            $file_name = time().'.'.$request->poster->extension();
            $request->poster->move(public_path('image'), $file_name);
            $data->poster = $file_name;
        }

        $data->title = $request->title;
        $data->summary = $request->summary;
        $data->release_year = $request->release_year;
        $data->genre_id = $request->genre_id;
        $data->update();
        return redirect('/film');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = films::find($id);
        $path = 'image/';
        File::delete($path.$data->poster);
        $data->delete();
        return redirect('/film');
    }

    public function storeReview(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);
        $review = new reviews();
        $review->film_id = $id;
        $review->user_id = Auth::id();
        $review->content = $request->comment;
        $review->point = $request->rating;
        $review->save();
        return redirect()->route('film.show', $id);
    }
}
