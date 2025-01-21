<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register () {
        return view('form');
    }

    public function submit_form (Request $user_input) {
        $first_name = $user_input->input('first_name');
        $last_name = $user_input->input('last_name');

        return view('greeting', ['first_name' => $first_name, 'last_name' => $last_name]);
    }
}
