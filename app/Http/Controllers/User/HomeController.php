<?php

namespace App\Http\Controllers\User;

use App\Model\User\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        return view('user.home');
    }

    public function blog(){
        $posts=Post::where('status',1)->get();
        return view('user.blog', compact('posts'));
    }

    public function resume(){
        return view('user.about');
    }
}
