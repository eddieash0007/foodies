<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;

class FrontEndController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('frontend.index')->with('posts', $posts);
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function postSingle($slug)
    {
        $post = Post::where('slug',$slug)->first();
        $category = Category::all();
        $tags = Tag::all();
        return view('frontend.postSingle')->with('post', $post)
                                          ->with('category', $category)
                                          ->with('tags', $tags);
    }


}
