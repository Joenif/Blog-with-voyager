<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Category;


class PostController extends Controller
{
    public function read(Request $request)
    {
        $slug = $request->slug;
        
        $post = Posts::with(['user', 'category'])->where('slug', '=', $slug)->first();

        $f_posts = Posts::published()->featured()->with(['user', 'category'])->latest()->get();
        
        return view('post.read', compact(['post', 'f_posts']));
    }

    public function category(Posts $posts, $slug) {
        $category = Category::where('slug',$slug)->firstOrFail();

        if ($category->children->isNotEmpty()) {
            
            $posts = $category->categoryPosts();

        }
        else $posts = Posts::published()->with(['user', 'category'])->where('category_id', '=', $category->id)->get();
        
        return view('post.category', compact(['posts', 'category']));
    }
}
