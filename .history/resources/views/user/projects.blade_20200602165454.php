@extends('user.app')

@section('header-title', 'Projects')
@section('bg-img',asset('user/img/projects.png'))
@section('title', "Projects")
@section('subheading', 'Coming soon...')



@section('content')
    <div class="container">
        <img class="img-fluid" src="{{ asset('user/img/coming-soon.png')) }}" alt="">
    </div>
@endsection

