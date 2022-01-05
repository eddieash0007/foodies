<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
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
        $post = Post::find($slug);
        return view('frontend.postSingle')->with('post', $post);
    }


}
