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
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
       @if ($posts->count() > 0)
       @foreach ($posts as $post)
       <div class="post-preview">
           <a href="{{ route('post', $post->slug) }}">
             <h2 class="post-title">
               {{ $post->title }}
             </h2>
             <h3 class="post-subtitle">
               {{ $post->subtitle }}
             </h3>
           </a>
           @foreach ($post->tags as $tag)
           <small class="text-success">#{{ $tag->name }}</small>
           @endforeach
           <p class="post-meta">Posted {{ $post->created_at->diffForHumans() }} by
             <a href="#">Start Bootstrap</a>
             {{\Carbon\Carbon::parse($post->created_at)->format('M d, Y - g:i A')}}
            </p>
         </div>
         <hr>
       @endforeach
       @else
       <h3 class="post-subtitle">No Post Added Yet</h3>
       @endif

        <!-- Pager -->
        <div class="clearfix">
            <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
            {{ $posts->links() }}
        </div>
      </div>
    </div>
  </div>

@endsection
