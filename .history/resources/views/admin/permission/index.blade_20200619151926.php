@extends('admin.layouts.app')

@section('headSection')

@endsection
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@section('main-content')
                <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('helpers.messages')
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="card-title">Manage Permissions</h3>
        <a href="{{route('permission.create')}}" class="ml-auto btn btn-success d-flex align-items-center"><ion-icon name="add-circle-outline" class="text-lg"></ion-icon> Add Permission</a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Permission</th>
            <th>Assigned to:</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($permissions as $permission)
            <tr>
              <td>{{$loop->index + 1}}</td>
              <td>{{$permission->name}}</td>
              <td>{{$permission->for}}</td>
              <td><a href="{{route('permission.edit',$permission->id)}}"><ion-icon name="create-outline" class="text-success text-lg"></ion-icon>
              </a></td>
              <td>
                <a href="#" data-url="{{ route('permission.destroy', $permission->id) }}" class="delete-permission" data-toggle="modal" data-target="#exampleModal"><ion-icon name="trash-bin-outline" class="text-lg text-danger"></ion-icon></a>
              </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>No</th>
            <th>Permission</th>
            <th>Assigned to:</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.content-wrapper -->
  @include('admin.layouts.deleteModal')
@endsection

@section('footerSection')
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });

    $('.delete-permission').click(function () {
        var url = $(this).attr('data-url');
        $("#dynamicForm").attr("action", url);
    });
  });
</script>
@endsection
