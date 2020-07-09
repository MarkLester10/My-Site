@extends('user.app')

@section('header-title',(request()->is('blog/post/category/*') || request()->is('blog/post/tag/*'))? \Str::ucfirst(collect(request()->segments())->last()) :"Reads")
@section('bg-img',asset('user/img/home-bg.jpg'))
@section('title',(request()->is('blog/post/category/*') || request()->is('blog/post/tag/*'))? \Str::ucfirst(collect(request()->segments())->last()) :"Reads")

@if((request()->is('blog/post/category/*')))
  @section('subheading','Category')
@elseif((request()->is('blog/post/tag/*')))
  @section('subheading','Tag')
@else
  @section('subheading','Hi!, enjoy reading our blog. Be insipired and learn from our stories')
@endif





@section('content')
     <!-- Main Content -->

  <div class="container" id="app">
    <vue-progress-bar></vue-progress-bar>
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <posts
        v-for="post in blog"
        :title="post.title"
        :subtitle="post.subtitle"
        :created_at="post.created_at"
        :tag_name="post.tags"
        :key="post.index"
        :post-id="post.id"
        :slug="post.slug"
        path={{ route('post') }}
        login={{ Auth::check() }}
        :likes="post.likes.length"
        ></posts>


        <!-- Pager -->
        <div class="clearfix">
            {{-- <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a> --}}
            {{ $posts->links() }}
        </div>
      </div>
    </div>
  </div>

@endsection

@section('footer')
  <script src="{{ asset('js/app.js') }}"></script>
@endsection
