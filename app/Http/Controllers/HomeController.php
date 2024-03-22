<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

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
        //Get all the post of login User
        //$listOfposts = Post::all();
       // $listOfposts = auth()->user()->posts()->get(); 
          $listOfposts = auth()->user()->posts()->orderBy('created_at', 'desc')->get(); 

        //shortcut
        //$listOfposts = auth()->user()->posts->sortByDesc('created_at');
        return view('home', compact('listOfposts'));
    }
}
