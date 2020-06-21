@extends('admin.layouts.app')

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Tag</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tag</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10 mx-auto">

          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Titles</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{route('tag.update', $tag->id)}}" method="POST">
              @csrf
              @method('PATCH')
              <div class="card-body">
                <div class="row">
                <div class="col-lg-6 mx-auto">
                  <div class="form-group">
                    <label for="name">Tag Name</label>
                    <input type="text" name="name" class="form-control @if($errors->has('name')) is-invalid @endif" id="name" placeholder="Enter Tag Name" value="{{(old('name',$tag->name}})">
                    @error('name')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="slug">Tag Slug</label>
                    <input type="text" class="form-control @if($errors->has('slug')) is-invalid @endif" id="slug" name="slug" placeholder="Slug"  value="{{$tag->slug}}">
                    @error('slug')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{route('tag.index')}}" class="btn btn-default">Cancel</a>
                  </div>
                </div>
              </div>
            </div>
              <!-- /.card-body -->

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

<script>
   $('#name').change(function(e) {
    $.get('{{ route('posts.check_slug') }}',
      { 'title': $(this).val() },
      function( data ) {
        $('#slug').val(data.slug);
      }
    );
  });
</script>
@endsection
