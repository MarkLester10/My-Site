<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User\Post;
use App\Model\User\Tag;
use App\Model\User\Category;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        return view('admin.post.index', compact('posts'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.post', compact('tags', 'categories'));
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
            'image'=>'required',
            'status'=>'sometimes'
            ]);
            if($request->hasFile('image')){
                return 'yes';
            }

            $post = Post::create($validatedData);
            $post->tags()->sync($request->tags);
            $post->categories()->sync($request->categories);

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

            $tags = Tag::all();
            $categories = Category::all();
            $post = Post::find($id);
            return view('admin.post.edit', compact('post', 'tags', 'categories'));
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

                $post->tags()->sync($request->tags);
                $post->categories()->sync($request->categories);
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
                $post = Post::where('id', $id)->first();
                $post->delete();
                return redirect()->back()->with('success','Post Deleted Successfully');
            }
        }
