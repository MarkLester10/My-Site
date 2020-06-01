@extends('user.app')

@section('header-title', $post->title)
@section('bg-img',asset('user/img/post-bg.jpg'))
@section('title', $post->title)
@section('subheading', $post->subtitle)



@section('content')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0&appId=714944875930667&autoLogAppEvents=1"></script>
      <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <small class="text-muted">Created {{ $post->created_at->diffForHumans() }}</small>
                @foreach ($post->categories as $category)
                <small class="float-right text-success mr-2">
                    <a href="#">{{ $category->name }}</a>
                    @if (!$loop->last),@endif
                </small>
                @endforeach
            {!! htmlspecialchars_decode($post->body) !!}
            <h2 class="pb-3">Tags</h2>
            @foreach ($post->tags as $tag)
            <small class="text-dark rounded p-2 border m-2">
                    <a href="#">#{{ $tag->name }}</a>
            </small>
            @endforeach

        </div>
      </div>
    </div>
  </article>
  <div class="mt-5 fb-comments" data-href="{{Request::url()}}" data-numposts="10" data-width=""></div>
@endsection

