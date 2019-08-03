@extends('Tutor/layouts/app')




@section('main-content')

       
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Hire List</h3>

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
                        <th>Name</th>
                        <th>Type</th>
                        <th>Hire Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr> @php $i=1; @endphp
                    @if(count($hires)>0)
                      @foreach($hires as $hire)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>@if($hire->student_id == 0) {{$hire->student_parent->name}} @else {{$hire->student->name}} @endif</td>
                            <td>@if($hire->student_id == 0) Parent @else Student @endif</td>
                            <td>{{$hire->created_at}}</td>
                            <td>{{$hire->status}}</td>
                            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-status="{{$hire->status}}" data-id="{{$hire->id}}">Update</button></td>
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form method="post" action="{{route('update_status')}}">
      <div class="modal-body">
       @csrf
            <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Change Status:</label>
            <select class="form-control" name="status" id="status">
                <option></option>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" >Update</button>
      </div>
      </form>
    </div>
  </div>
</div>


@endsection


@push('scripts')
<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var status = button.data('status') // Extract info from data-* attributes
  var id = button.data('id') // Extract info from data-* attributes
  var modal = $(this)
  var a= '<option value="Pending">Pending</option><option value="Accepted">Accepted</option><option value="Rejected">Rejected</option>';
  if(status == 'Accepted'){
   var a= '<option value="Accepted">Accepted</option><option value="Pending">Pending</option><option value="Rejected">Rejected</option>';   
  }
  else if(status == 'Rejected'){
         var a= '<option value="Rejected">Rejected</option><option value="Accepted">Accepted</option><option value="Pending">Pending</option>'; 
  }
  modal.find('#status').empty().append(a)
  modal.find('#id').val(id)
})
</script>
@endpush



















