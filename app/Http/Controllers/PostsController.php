<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        $categories = Category::all();
        return view ('admin.posts.index')->with('categories',$categories)
                                         ->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        if($categories->count()==0 || $tags->count() == 0)
        {
            Alert::warning('Caution','You need create a categories and tag(s) before creating a post');
           
            return redirect()->back();
        }

        return view ('admin.posts.create')->with('tags',$tags)
                                          ->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png',
            'post' => 'required',
            'category_id' => 'required',
        ]);

        $post = new Post;

        if ($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('uploads/posts',$image_new_name);
            $post->image = 'uploads/posts/'.$image_new_name;
        }
        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->post = $request->post;
        $post->author = Auth::user()->name;
        $post->slug = Str::of($request->title)->slug('-');
        

        $post->save();
        $post->tags()->attach($request->tags);


        // $post = Post::create([
        //     'title' => $request->title,
        //     'author' => 'Edwin',
        //     'image' => 'uploads/categories/'.$image_new_name,
        //     'slug' => Str::of($request->title)->slug('-'),
        // ]);

        Alert::toast('Post added successfully','success')->position('top-end');
        return redirect()->route('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::find($id);
        $tags = Tag::all();
        $categories = Category::all();
        return view ('admin.posts.edit')->with('categories',$categories)
                                         ->with('post',$posts)
                                         ->with('tags',$tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

       
        if ($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('uploads/posts', $image_new_name);
            $post->image = 'uploads/posts/'.$image_new_name;
        }


        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->post = $request->post;
        $post->author = Auth::user()->name;
        $post->slug = Str::of($request->title)->slug('-');
        $post->save();

        $post->tags()->sync($request->tags);

        Alert::toast('Post updated successfully','success')->position('top-end');
        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        Alert::toast('Post trashed successfully','success')->position('top-end');
        return redirect()->back();
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();


        return view('admin.posts.trashed')->with('posts', $posts);
    }

    public function kill($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        if (file_exists($post->image)) {

            @unlink($post->image);
     
        }

        $post->forceDelete();

        Alert::toast('Post deleted permanently','success')->position('top-end');

        return redirect()->back();
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        $post->restore();

        Alert::toast('Post restored successfully','success')->position('top-end');

        return redirect()->route('posts');
    }
}
