@extends('layouts/app')




@section('main-content')

       
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Hire Tutor List</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
           <div class="card">
 
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>SL</th>
                        <th>Tutor Name</th>
                        <th>Status</th>
                        <th>Hire Date</th>
                    </tr> @php $i=1; @endphp
                    @if(count($hires)>0)
                      @foreach($hires as $hire)
                        <tr>
                            <td>{{$i++}}</td>
                            <td><a href="{{route('tutor_details',$hire->tutor_id)}}">{{$hire->tutor->name}}</a></td>
                            <td>{{$hire->status}}</td>
                            <td>{{$hire->created_at}}</td>
                        </tr>
                      @endforeach
                    @endif
                </table>

            </div>
            <!-- /.card-body -->
          </div>
        </div>
      
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
  </div>
  <!-- /.content-wrapper -->
@endsection