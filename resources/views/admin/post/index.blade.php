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
        <h3 class="card-title">Manage Posts</h3>
        <a href="{{route('post.create')}}" class="ml-auto btn btn-success"><i class="fa fa-plus-circle"></i> Add Post</a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>P.No</th>
            <th>Title</th>
            <th>Subtitle</th>
            <th>Slug</th>
            <th>Created At</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($posts as $post)
            <tr>
              <td>{{$loop->index + 1}}</td>
              <td>{{$post->title}}</td>
              <td>{{$post->subtitle}}</td>
              <td>{{$post->slug}}</td>
              <td>{{\Carbon\Carbon::parse($post->created_at)->format('M d, Y - g:i A')}}</td>
              <td><a href="#"><i class="fa fa-edit text-success"></i></a></td>
              <td><a href="{{route('post.destroy',$post->id)}}"><i class="fa fa-trash text-danger"></i></a></td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>P.No</th>
            <th>Title</th>
            <th>Subtitle</th>
            <th>Slug</th>
            <th>Created At</th>
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