@extends('admin.layouts.app')

@section('headSection')
<link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Blog Editor</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blog Editor</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Titles</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <div class="row">
                                {{-- titles --}}
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="postTitle">Post Title</label>
                                        <input type="text" name="title" class="form-control @if($errors->has('title')) is-invalid @endif" id="postTitle" placeholder="Enter Title" value="{{$post->title}}">
                                        @error('title')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="subtitle">Post Subtitle</label>
                                        <input type="text" class="form-control @if($errors->has('subtitle')) is-invalid @endif" id="subtitle" name="subtitle" placeholder="Subtitle" value="{{$post->subtitle}}">
                                        @error('subtitle')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">Post Slug</label>
                                        <input type="text" class="form-control @if($errors->has('slug')) is-invalid @endif" id="slug" name="slug" placeholder="Slug" value="{{$post->slug}}">
                                        @error('slug')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- /titles --}}

                                {{-- file input --}}
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input @if($errors->has('image')) is-invalid @endif" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                @error('image')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Select Tags</label>
                                        <select name="tags[]" class="select2 select2-hidden-accessible" multiple="" data-placeholder="Select a Tag" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                            @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}"
                                                @foreach($post->tags as $postTag)
                                                @if ($postTag->id == $tag->id)
                                                selected
                                                @endif
                                                @endforeach
                                                >{{ $tag->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Select Categories</label>
                                            <div class="select2-purple">
                                                <select name="categories[]" class="select2 select2-hidden-accessible" multiple="" data-placeholder="Select a Category" data-dropdown-css-class="select2-purple" style="width: 100%;" data-select2-id="19" tabindex="-1" aria-hidden="true">
                                                    @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        @foreach ($post->categories as $postCategory)
                                                        @if ($postCategory->id == $category->id)
                                                        selected
                                                        @endif
                                                        @endforeach
                                                        >{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card card-outline card-dark">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                Start writing your amazing stories :)
                                                <small>Simple and fast</small>
                                            </h3>
                                            <!-- tools box -->
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                                                title="Collapse">
                                                <i class="fas fa-minus"></i></button>
                                            </div>
                                            <!-- /. tools -->
                                        </div>

                                        <!-- /.card-header -->
                                        <div class="card-body pad">
                                            <div class="mb-3">
                                                <textarea class="textarea @if($errors->has('body')) is-invalid @endif" name="body" placeholder="Place your story here" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$post->body}}</textarea>
                                                @error('body')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-success">Save</button>
                                            <a href="{{route('post.index')}}" class="btn btn-default">Cancel</a>
                                            <div class="form-check mt-3">
                                                <input type="checkbox" name="status" class="form-check-input" id="publish"  @if($post->status) checked @endif>
                                                <label class="form-check-label" for="publish">Publish</label>
                                                <small class="text-muted d-block">You have this option if you're not done writing your beautiful stories :)</small>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card -->



                            </div>
                            <!-- /.col-->
                        </div>
                        <!-- ./row -->
                    </section>
                    <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->
                @endsection

                @section('footerSection')
                <script src="{{ asset("admin/plugins/select2/js/select2.full.min.js") }}"></script>
                <script src="{{ asset("admin/ckeditor/ckeditor.js") }}"></script>
                <script>
                    CKEDITOR.replace('body');
                    $(document).ready(function () {
                        $('.select2').select2();
                        //Initialize Select2 Elements
                    });
                </script>
                @endsection
