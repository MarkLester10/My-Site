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
            <h1>Create User</h1>
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

          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Add Admin</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{route('user.store')}}" method="POST">
              @csrf
              <div class="card-body">
                <div class="row">
                <div class="col-lg-6 mx-auto">

                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control @if($errors->has('name')) is-invalid @endif" id="name" placeholder="Enter User Name" value="{{old('name')}}">
                    @error('name')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control @if($errors->has('email')) is-invalid @endif" id="email" name="email" placeholder="Email"  value="{{old('email')}}">
                    @error('email')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
                    @error('password')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                  </div>

                  <div class="form-group">
                    <label>Select Roles</label>
                    <select name="roles[]" class="select2 select2-hidden-accessible" multiple="" data-placeholder="Select a Role" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                      @foreach ($roles as $role)
                      <option value="{{ $role->id }}">{{ $role->name }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                     <label class="d-block">
                        <input type="checkbox" name="status" value="1">
                        Active
                     </label>
                     <small>Status</small>
                  </div>


                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('user.index')}}" class="btn btn-default">Cancel</a>
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
