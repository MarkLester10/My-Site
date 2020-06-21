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
            <h1>Edit Role</h1>
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
              <h3 class="card-title">You're about to edit a role</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{route('role.update', $role->id)}}" method="POST">
              @csrf
              @method('PATCH')
              <div class="card-body">
                <div class="row">
                <div class="col-lg-6 mx-auto">

                  <div class="form-group">
                    <label for="name">Role Title</label>
                    <input value="{{ $role->name }}" type="text" name="name" class="form-control @if($errors->has('name')) is-invalid @endif" id="name" placeholder="Enter Role Title" value="{{old('name')}}">
                    @error('name')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Posts Permissions</label>
                    <select name="permissions[]" class="select2 select2-hidden-accessible" multiple="" data-placeholder="Select posts permissions" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                        @foreach ($permissions as $permission)
                        @if ($permission->for === 'post')
                        <option value="{{ $permission->id }}"

                            @foreach ($role->permissions as $role_permit)
                                @if ($role_permit->id === $permission->id)
                                    selected
                                @endif
                            @endforeach

                        >{{ $permission->name }}</option>
                        @endif
                      @endforeach
                    </select>
                    @error('permissions')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>User Permissions</label>
                    <select name="permissions[]" class="select2 select2-hidden-accessible" multiple="" data-placeholder="Select user's permissions" style="width: 100%;" data-select2-id="19" tabindex="-1" aria-hidden="true">
                      @foreach ($permissions as $permission)
                        @if ($permission->for === 'user')
                        <option value="{{ $permission->id }}"

                        @foreach ($role->permissions as $role_permit)
                            @if ($role_permit->id === $permission->id)
                                selected
                            @endif
                        @endforeach

                        >{{ $permission->name }}</option>
                        @endif
                      @endforeach
                    </select>
                    @error('permissions')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Other Permissions</label>
                        <div class="container d-flex justify-content-around">
                        @foreach ($permissions as $permission)
                        @if ($permission->for === 'other')
                            <label>
                                <input class="@if($errors->has('permissions')) is-invalid @endif" type="checkbox" value="{{ $permission->id }}" name="permissions[]">
                                {{ $permission->name }}
                           </label>
                        @endif
                      @endforeach
                        </div>

                    @error('permissions')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-success">Save</button>
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
