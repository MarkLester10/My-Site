<?php

namespace App\Http\Controllers\Admin;

use App\Model\User\Tag;
use App\Model\User\Post;
use Illuminate\Support\Str;
use App\Blog\PostsViewModel;
use App\Model\User\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

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
        $viewModel = new PostsViewModel($posts);
        return view('admin.post.index', $viewModel);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('posts.create')) {
            $tags = Tag::all();
            $categories = Category::all();
            return view('admin.post.post', compact('tags', 'categories'));
        }

        return redirect()->route('post.index')->with('message', 'You are not Authorized to Create Posts');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        isset($request->status) ? $request->merge(['status' => 1]) :  $request->merge(['status' => null]);
        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:150',
            'subtitle' => 'required',
            'slug' => 'required|unique:posts',
            'body' => 'required',
            'image' => 'required',
            'status' => 'sometimes'
        ]);

        if ($request->hasFile('image')) {
            $imageName = $request->image->getClientOriginalName();
            $request->image->move(public_path('images'), $imageName);
        }


        $post = new Post;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->image = $imageName;
        $post->status = $request->status;
        $post->posted_by = auth()->user()->name;
        $post->save();
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
        if (Auth::user()->can('posts.update')) {
            $tags = Tag::all();
            $categories = Category::all();
            $post = Post::find($id);
            return view('admin.post.edit', compact('post', 'tags', 'categories'));
        }
        return redirect()->route('post.index')->with('message', 'You are not Authorized to Edit this Post');
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
        isset($request->status) ? $request->merge(['status' => 1]) :  $request->merge(['status' => null]);
        $validatedData = $request->validate([
            'title' => 'required|max:150|unique:posts,title,' . $post->id,
            'subtitle' => 'required',
            'slug' => 'required|unique:posts,slug,' . $post->id,
            'body' => 'required',
            'image' => 'required'
        ]);


        if ($request->hasFile('image')) {
            $imageName = $request->image->getClientOriginalName();
            if ($post->image != $imageName) {
                unlink(public_path('images/' . $post->image));
            }
            $request->image->move(public_path('images'), $imageName);
        }
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->image = $imageName;
        $post->status = $request->status;
        $post->posted_by = auth()->user()->name;
        $post->save();
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);

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
        if (Auth::user()->can('posts.delete')) {
            $post = Post::where('id', $id)->first();
            $post->delete();
            return redirect()->back()->with('success', 'Post Deleted Successfully');
        }
        return redirect()->route('post.index')->with('message', 'You are not Authorized to Delete this Post');
    }

    public function check_slug(Request $request)
    {
        $slug = Str::slug($request->title, '-');
        return response()->json(['slug' => $slug]);
    }
}