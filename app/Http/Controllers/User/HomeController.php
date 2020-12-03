<?php

namespace App\Http\Controllers\User;

use App\Model\User\Tag;
use App\Model\User\Post;
use App\Model\User\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{


    public function blog()
    {
        $posts = Post::where('status', 1)->orderBy('created_at', 'DESC')->paginate(5);
        return view('user.blog', compact('posts'));
    }

    public function resume()
    {
        return view('user.about');
    }

    public function tag(Tag $tag)
    {
        $posts = $tag->posts();
        return view('user.blog', compact('posts'));
    }
    public function category(Category $category)
    {
        $posts = $category->posts();
        return view('user.blog', compact('posts'));
    }

    public function projects(Category $category)
    {
        return view('user.projects');
    }
}