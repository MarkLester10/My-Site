<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('user.home');
    }

    public function blog(){
        return view('user.blog');
    }

    public function resume(){
        return view('user.about');
    }
}
