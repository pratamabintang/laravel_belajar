<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CastController extends Controller
{
    public function create () {
        return view('cast.add');
    }

    public function store (Request $request) {
        $request->validate([
            'name' => 'required|max:255',
            'age' => 'required',
            'bio' => 'required',
        ]);

        $query = DB::table('casts')->insert([
            "name" => $request["name"],
            "age" => $request["age"],
            "bio" => $request["bio"]
        ]);

        return redirect('/cast');
    }

    public function index () {
        $data = DB::table('casts')->get();
        return view('cast.show', compact('data'));
    }

    public function show ($id) {
        $data = DB::table('casts')->where('id', $id)->first();
        return view('cast.details', compact('data'));
    }

    public function edit ($id) {
        $data = DB::table('casts')->where('id', $id)->first();
        return view('cast.edit', compact('data'));
    }

    public function update ($id, Request $request) {
        $request->validate([
            'name' => 'required|max:255',
            'age' => 'required',
            'bio' => 'required',
        ]);

        $query = DB::table('casts')
            ->where('id', $id)
            ->update([
                'name' => $request["name"],
                'age' => $request["age"],
                'bio' => $request["bio"]
            ]);
        return redirect('/cast');
    }

    public function destroy($id)
    {
        $query = DB::table('casts')->where('id', $id)->delete();
        return redirect('/cast');
    }
}
