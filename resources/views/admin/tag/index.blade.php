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
        <h3 class="card-title">Manage Tags</h3>
        <a href="{{route('tag.create')}}" class="ml-auto btn btn-success d-flex align-items-center"><ion-icon name="add-circle-outline" class="text-lg"></ion-icon> Add Tag</a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>T.No</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($tags as $tag)
            <tr>
              <td>{{$loop->index + 1}}</td>
              <td>{{$tag->name}}</td>
              <td>{{$tag->slug}}</td>
              <td><a href="{{route('tag.edit',$tag->id)}}"><ion-icon name="create-outline" class="text-success text-lg"></ion-icon>
              </a></td>
              <td>
                <a href="" data-toggle="modal" data-target="#exampleModal"><ion-icon name="trash-bin-outline" class="text-lg text-danger"></ion-icon></a>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center" id="exampleModalLabel "><ion-icon name="help-circle-outline" class="text-xl"></ion-icon> Confirmation to Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="alert alert-dark">
                          <h6 class="alert-heading d-flex align-items-center text-warning"><ion-icon name="information-circle-outline" class="text-lg text-info"></ion-icon> You're about to delete a tag</h6>
                          <p class="mb-0">Are you sure you want to permanently delete this tag?</p>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <form action="{{route('tag.destroy', $tag->id)}}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Yes! Delete</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>T.No</th>
            <th>Name</th>
            <th>Slug</th>
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
  });
</script>
@endsection