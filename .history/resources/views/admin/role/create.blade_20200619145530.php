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
            <h1>Create Role</h1>
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
              <h3 class="card-title">Add roles now to modify user's access level</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{route('role.store')}}" method="POST">
              @csrf
              <div class="card-body">
                <div class="row">
                <div class="col-lg-6 mx-auto">

                  <div class="form-group">
                    <label for="name">Role Title</label>
                    <input type="text" name="name" class="form-control @if($errors->has('name')) is-invalid @endif" id="name" placeholder="Enter Role Title" value="{{old('name')}}">
                    @error('name')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Select Permission</label>
                    <select name="permissions[]" class="select2 select2-hidden-accessible" multiple="" data-placeholder="Select a Tag" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                      @foreach ($permissions as $permission)
                      <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                      @endforeach
                    </select>
                    @error('permissions')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                  </div>


                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('role.index')}}" class="btn btn-default">Cancel</a>
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
<script src="{{ asset("admin/plugins/select2/js/select2.full.min.js") }}"></script>
<script>
   $(document).ready(function () {
    $('.select2').select2();
    //Initialize Select2 Element
   });
</script>
@endsection
