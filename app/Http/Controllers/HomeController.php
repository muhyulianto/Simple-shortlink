<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\link;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $lists = link::orderBy('created_at', 'desc')->paginate(10);
      return view('home')->with('lists', $lists);
    }
}
