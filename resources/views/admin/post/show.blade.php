@extends('admin/layouts/app')

@section('headSection')
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap4.min.css') }}">
@endsection



@section('main-content')

       
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blank Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">POSTS</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
           <div class="card">
            <div class="card-header">
              <h3 class="card-title">ALL POSTS</h3>
                <a class="col-lg-offset-5 btn btn-success" href="{{route('post.create')}}">Add New</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Title</th>
                  <th>SubTitle</th>
                  <th>Slug</th>
                  <th>Created At</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($posts as $post)
                
                 <tr>
                  <td>{{$loop->index +1 }}</td>
                  <td>{{$post->title}}
                  </td>
                  <td>{{$post->subtitle}}</td>
                  <td>{{$post->slug}}</td>
                  <td>{{$post->created_at}}</td>
                  <td><a href="{{ route('post.edit',$post->id) }}"> <i class="far fa-edit"></i></a></td>
                 <td>
                              <form id="delete-form-{{ $post->id }}" method="post" action="{{ route('post.destroy',$post->id) }}" style="display: none">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                              </form>
                              <a href="" onclick="
                              if(confirm('Are you sure, You Want to delete this?'))
                                  {
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $post->id }}').submit();
                                  }
                                  else{
                                    event.preventDefault();
                                  }" ><i class="fas fa-trash"></i></a>
                            </td>
                </tr>
                @endforeach 
                
                </tbody>
                <tfoot>
               <tr>
                  <th>S.No</th>
                  <th>Title</th>
                  <th>SubTitle</th>
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
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection


@section('footerSection')

<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>

<script src="{{ asset('admin/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
@endsection