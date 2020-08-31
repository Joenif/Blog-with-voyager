<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('auth.register');
    }

    public function register()
    {
        // return view('auth.register');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('voyager.login');
    }
}
