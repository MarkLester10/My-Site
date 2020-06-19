@extends('admin.layouts.app')

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Permission</h1>
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
              <h3 class="card-title">Add permissions now to limit roles' access level</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{route('permission.store')}}" method="POST">
              @csrf
              <div class="card-body">
                <div class="row">
                <div class="col-lg-6 mx-auto">

                  <div class="form-group">
                    <label for="name">Permission Title</label>
                    <input type="text" name="name" class="form-control @if($errors->has('name')) is-invalid @endif" id="name" placeholder="Enter Permission Title" value="{{old('name')}}">
                    @error('name')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Create Permission for:</label>
                    <select name="for" class="select2 select2-hidden-accessible" multiple="" data-placeholder="Add permission for:" style="width: 100%;" data-select2-id="19" tabindex="-1" aria-hidden="true">
                     <option value="">User</option>
                     <option value="">Posts</option>
                     <option value="">Role</option>
                    </select>
                    @error('for')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('permission.index')}}" class="btn btn-default">Cancel</a>
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
