<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderBy('created_at', 'desc')->paginate(5);
        return view ('admin.categories.index')->with('categories', $category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.categories.create');
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
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png'

        ]); 

        $category = new Category;
        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('uploads/categories',$image_new_name);
            $category->image = 'uploads/categories/'.$image_new_name;
        }

        $category->name = $request->name;
        $category->description = $request->description;
        $category->slug = Str::of($request->name)->slug('-');

        $category->save();

        // $category = Category::create([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'image' => 'uploads/categories/'.$image_new_name,
        //     'slug' => Str::of($request->name)->slug('-'),
            
        // ]);

        Alert::toast('Category added successfully','success')->position('top-end');
        return redirect()->route('categories');
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        if($request->keyword != ''){
            $categories = Category::where('name','LIKE','%'.$request->keyword.'%')->get();
        }

        return response()->json([
            'categories' => $categories
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $category = Category::find($id);

        

        if($request->hasFile('image'))
        {
            $image = $request->image;

            $image_new_name = time().$image->getClientOriginalName();

            $image->move('uploads/categories', $image_new_name);

            $category->image = 'uploads/categories/'.$image_new_name;
        }

        $category->name = $request->name;
        $category->description = $request->description;
        $category->slug = Str::of($request->name)->slug('-');
        $category->save();

        Alert::toast('Category updated successfully','success')->position('top-end');
        return redirect()->route('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        foreach($category->posts as $post)
       {
            $post->forcedelete();
       }

        $category->delete();

        Alert::toast('Category trashed successfully','success')->position('top-end');
         return redirect()->back();

    }

    public function trashed()
    {
        $categories = Category::onlyTrashed()->get();

        return view('admin.categories.trashed')->with('categories', $categories);
    }

    public function kill($id)
    {
        $category = Category::withTrashed()->where('id', $id)->first();

        if (file_exists($category->image)) {

            @unlink($category->image);
     
        }

        $category->forceDelete();

        Alert::toast('Category deleted permanently','success')->position('top-end');

        return redirect()->back();

    }

    public function restore($id)
    {
        $category = Category::withTrashed()->where('id', $id)->first();

        $category->restore();

        Alert::toast('Category restored successfully','success')->position('top-end');

        return redirect()->route('categories');

    }
}
