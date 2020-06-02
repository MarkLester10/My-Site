@extends('user.app')

@section('header-title', 'Projects')
@section('bg-img',asset('user/img/projects.png'))
@section('title', "Projects")



@section('content')
<header class="masthead" style="background-image: url(@yield('bg-img'))">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Coming Soon</h1>
          </div>
        </div>
      </div>
    </div>
  </header>
@endsection

