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
            @can('posts.create', Auth::user())
            <a href="{{route('post.create')}}" class="ml-auto btn btn-success d-flex align-items-center">
                <ion-icon name="add-circle-outline" class="text-lg"></ion-icon> Add Post
            </a>
            @endcan
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
                        @can('posts.update', Auth::user())
                        <th>Edit</th>
                        @endcan
                        @can('posts.delete', Auth::user())
                        <th>Delete</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td class="text-center">
                            {{$loop->index + 1}}
                        </td>
                        <td>
                            {{$post->title}}
                            @if(!$post->status)
                            <span class="right badge badge-warning">Inc</span>
                            @endif
                        </td>
                        <td>{{$post->subtitle}}</td>
                        <td>{{$post->slugName}}</td>
                        <td>{{\Carbon\Carbon::parse($post->created_at)->format('M d, Y - g:i A')}}</td>

                        @can('posts.update', Auth::user())
                        <td><a href="{{route('post.edit',$post->id)}}">
                                <ion-icon name="create-outline" class="text-success text-lg"></ion-icon>
                            </a></td>
                        @endcan

                        @can('posts.delete', Auth::user())
                        <td>
                            <a href="#" data-url="{{ route('post.destroy', $post->id) }}" class="delete-post"
                                data-toggle="modal" data-target="#exampleModal">
                                <ion-icon name="trash-bin-outline" class="text-lg text-danger"></ion-icon>
                            </a>
                        </td>
                        @endcan
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
                        @can('posts.update', Auth::user())
                        <th>Edit</th>
                        @endcan
                        @can('posts.delete', Auth::user())
                        <th>Delete</th>
                        @endcan
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
    });

    $('.delete-post').click(function () {
        var url = $(this).attr('data-url');
        $("#dynamicForm").attr("action", url);
    });
</script>
@endsection
