@extends('admin.layouts.app')

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
            <form role="form" action="{{route('post.store')}}" method="POST">
              @csrf
              <div class="card-body">
                <div class="row">
                {{-- titles --}}
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="postTitle">Post Title</label>
                    <input type="text" name="title" class="form-control @if($errors->has('title')) is-invalid @endif" id="postTitle" placeholder="Enter Title" value="{{old('title')}}">
                    @error('title')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="subtitle">Post Subtitle</label>
                    <input type="text" class="form-control @if($errors->has('subtitle')) is-invalid @endif" id="subtitle" name="subtitle" placeholder="Subtitle" value="{{old('subtitle')}}">
                    @error('subtitle')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="slug">Post Slug</label>
                    <input type="text" class="form-control @if($errors->has('slug')) is-invalid @endif" id="slug" name="slug" placeholder="Slug" value="{{old('slug')}}">
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
                  <br>
                  <div class="form-check">
                    <input type="checkbox" name="status" class="form-check-input" id="publish">
                    <label class="form-check-label" for="publish">Publish</label>
                  </div>
                </div>
                {{-- /file input --}}
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
                    <textarea class="textarea @if($errors->has('body')) is-invalid @endif" name="body" placeholder="Place your story here" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('body')}}</textarea>
                    @error('image')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                    @enderror
                  </div>
              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('post.index')}}" class="btn btn-default">Cancel</a>
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