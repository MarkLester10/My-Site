@extends('user.app')

@section('header-title', 'Login')
@section('title', 'Login')




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
                <small class="float-right mr-2">
                    <a class="text-success" href="{{ route('category', $category->slug) }}">{{ $category->name }}</a>
                    @if (!$loop->last),@endif
                </small>
                @endforeach
            {!! htmlspecialchars_decode($post->body) !!}
            <h2 class="pb-3">Tags</h2>
            @foreach ($post->tags as $tag)
            <a href="{{ route('tag', $tag->slug) }}" class="text-dark rounded p-2 border m-2 text-decoration-none">
                <small >
                    #{{ $tag->name }}
                </small>
            </a>
            @endforeach
            <div class="mt-5 fb-comments" data-href="{{Request::url()}}" data-numposts="10" data-width=""></div>
        </div>
      </div>
    </div>
  </article>
@endsection








@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
