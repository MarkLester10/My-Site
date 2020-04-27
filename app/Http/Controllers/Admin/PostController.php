<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        isset($request->status) ? $request->merge(['status'=>1]) :  $request->merge(['status'=>null]);
        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:150',
            'subtitle' => 'required',
            'slug' => 'required|unique:posts',
            'body' => 'required',
            'image'=>'required'
        ]);

        Post::create($validatedData);
        
        return redirect()->route('post.index')->with('success', 'Post Added Successfully');
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
        $post = Post::find($id);
        return view('admin.post.edit', compact('post'));
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
        isset($request->status) ? $request->merge(['status'=>1]) :  $request->merge(['status'=>null]);
        $validatedData = $request->validate([
            'title' => 'required|max:150|unique:posts,title,'.$post->id,
            'subtitle' => 'required',
            'slug' => 'required|unique:posts,slug,'.$post->id,
            'body' => 'required',
            'image'=>'required'
        ]);
        
        $post->update($request->only(['title', 'sutitle','slug', 'body', 'image', 'status']));
        return redirect()->route('post.index')->with('success', 'Post has been Updated');
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
        return redirect()->back()->with('success','Post Deleted Successfully');
    }
}
