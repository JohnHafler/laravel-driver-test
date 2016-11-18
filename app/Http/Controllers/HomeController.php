<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', [
            'user_id' => isset(Auth::user()->id) ? Auth::user()->id : null,
            'access_token' => isset(Auth::user()->remember_token) ? Auth::user()->remember_token : null,
        ]);
    }
}
