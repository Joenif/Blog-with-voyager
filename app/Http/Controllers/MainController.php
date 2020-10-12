<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Category;


class MainController extends Controller
{
    public function index() {

        $p_posts = Posts::published()->with(['user', 'category'])->latest()->get();

        $f_posts = Posts::published()->featured()->with(['user', 'category'])->latest()->get()->toArray();

        return view('index', compact(['p_posts', 'f_posts']));
    }

    public function search(Request $request)
    {
       $query = $request->input('q');
    
       $posts = Posts::published()->where('title', 'LIKE', "%$query%")->with(['user', 'category'])->paginate(12);
        
       if (!$posts->isNotEmpty()) {
           return back()->withMessage('Search not found');
       }
       return view('post.search', compact('posts'));
    }

}