<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::id();

        $detail = Profile::where('user_id', $user)->first();
        return view('profile.index', compact('detail'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'age' => 'required',
            'bio' => 'required',
        ]);

        $profile = Profile::find($id);
        $profile->age = $request->age;
        $profile->bio = $request->bio;
        $profile->update();
        return redirect('/profile');
    }
}
