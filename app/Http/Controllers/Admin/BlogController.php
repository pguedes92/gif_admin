<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\category;
use App\Models\post;
use App\Models\tag;

class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::all();
        return view('admin.blog.show', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //if (Auth::user()->can('posts.create')) {
            $tags = tag::all();
            $categories = category::all();
            
            return view('admin.blog.post', compact('tags', 'categories'));
        //}
        return redirect(route('admin.dashboard'));
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
            'title'=>'required',
            'tags' => 'required',
            'categories' => 'required',
            'status' => 'required',
            'body' => 'required',
            //'image' => 'required',
        ]);

        /* if ($request->hasFile('image')) {
            $imageName = $request->image->store('public');
        }else{
            return 'No';
        } */

        $post = new post;
        //$post->image = $imageName;
        $post->slug = str_slug($request->title);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->status = $request->status;
        $post->save();
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);

        return redirect(route('admin.posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //if (Auth::user()->can('posts.update')) {
            $post = post::with('tags', 'categories')->where('id', $id)->first();
            $tags = tag::all();
            $categories = category::all();

            return view('admin.blog.edit', compact('tags', 'categories', 'post'));
        //}

        return redirect(route('admin.dashboard'));
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
        $this->validate($request,[
            'title'=>'required',
            'tags' => 'required',
            'categories' => 'required',
            'status' => 'required',
            'body' => 'required',
            //'image' => 'required',
        ]);

        /* if ($request->hasFile('image')) {
            $imageName = $request->image->store('public');
        } */

        $post = post::find($id);
        //$post->image = $imageName;
        $post->slug = str_slug($request->title);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->status = $request->status;
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);
        $post->save();

        return redirect(route('admin.posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        post::where('id', $id)->delete();
        return redirect()->back();
    }
}
