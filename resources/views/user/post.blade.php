@extends('user.app')

@section('bg-img',asset('user/img/post-bg.jpg'))
@section('title', $post->title)
@section('subheading', $post->subtitle)


@section('content')
      <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <small class="text-muted">Created {{ $post->created_at->diffForHumans() }}</small>
                @foreach ($post->categories as $category)
                <small class="float-right text-success mr-2">
                    {{ $category->name }}
                    @if (!$loop->last),@endif
                </small>
                @endforeach
            {!! htmlspecialchars_decode($post->body) !!}
            <h2 class="pb-3">Tags</h2>
            @foreach ($post->tags as $tag)
            <small class="text-dark rounded p-2 border m-2">
                    #{{ $tag->name }}
            </small>
            @endforeach
        </div>
      </div>
    </div>
  </article>
@endsection
