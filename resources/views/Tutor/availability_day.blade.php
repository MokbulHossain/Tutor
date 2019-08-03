@extends('Tutor/layouts/app')




@section('main-content')

       
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Avilability Days</h3>

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
              <h3 class="card-title">Avilability Days</h3>
                <a class="col-lg-offset-5 btn btn-success" data-toggle="modal" data-target="#exampleModal2" href="#">Add New</a>
                <br><br>
                @if (session('message'))
                  <p class="alert alert-success">{{ session('message') }}</p>
              @endif
                    <p style="background-color: red" id="error"></p>    
              </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Day</th>
                  <th>Pre 12pm</th>
                  <th>12-5pm</th>
                  <th>After 5pm</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody> 
              @foreach($days as $day=>$value)
              @php $i=0; @endphp
              <tr>
               <td>{{$days[$day]}}</td>
                @foreach ($avilabilities as $avilabilitie)
                 @if( $avilabilitie->day == $days[$day])
                  @if($avilabilitie->avilable_time1 == 1)
                  <td><i class="fa fa-check"></i></td>
                  @else
                    <td></td>
                  @endif
                   @if($avilabilitie->avilable_time2 == 1)
                  <td><i class="fa fa-check"></i></td>
                  @else
                    <td></td>
                  @endif
                   @if($avilabilitie->avilable_time3 == 1)
                  <td><i class="fa fa-check"></i></td>
                  @else
                    <td></td>
                  @endif
                  <td>


                    <a  data-toggle="modal" data-target="#exampleModal" data-day="{{$avilabilitie->day}}" data-avilable_time1="{{$avilabilitie->avilable_time1}}"  data-avilable_time2="{{$avilabilitie->avilable_time2}}"  data-avilable_time3="{{$avilabilitie->avilable_time3}}" data-id="{{$avilabilitie->id}}" href="#"> <i class="far fa-edit"></i></a></td>
                 <td>
                              <form id="delete-form-{{ $avilabilitie->id }}" method="post" action="{{ route('avilable_time.destroy',$avilabilitie->id) }}" style="display: none">
                                {{ csrf_field() }}
                              </form>
                              <a href="" onclick="
                              if(confirm('Are you sure, You Want to delete this?'))
                                  {
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $avilabilitie->id }}').submit();
                                  }
                                  else{
                                    event.preventDefault();
                                  }" ><i class="fas fa-trash"></i></a>
                            </td> 
                    @php $i++; @endphp
                @endif
                @endforeach 
                  @if($i == 0)
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                @endif
              </tr>
              @endforeach
                </tbody>
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
  </div>
  <!-- /.content-wrapper -->



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit_form">
          <input type="hidden" name="id" id="row_id">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Days:</label>
             <select class="form-control" name="day" id="select_day">
             
             </select>
          </div>
          <div class="form-group">
            <table class="table">
              <tr>
                <td><input type="checkbox" name="avilable_time1" id="c1" value="1"></td>
                <td> Pre 12pm </td>
                <td><input type="checkbox" name="avilable_time2" id="c2" value="2"></td>
                <td> 12-5pm</td>
                <td><input type="checkbox" name="avilable_time3" id="c3" value="3"></td>
                <td>After 5pm </td>
              </tr>
            </table>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="my_ajax1()">update</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="new_form">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Days:</label>
             <select class="form-control" name="day" >
               @foreach($days as $key=>$value)
                <option value="{{$days[$key]}}">{{$days[$key]}}</option>
               @endforeach
             </select>
          </div>
          <div class="form-group">
            <table class="table">
              <tr>
                <td><input type="checkbox" name="avilable_time1" value="1"></td>
                <td> Pre 12pm </td>
                <td><input type="checkbox" name="avilable_time2" value="2"></td>
                <td> 12-5pm</td>
                <td><input type="checkbox" name="avilable_time3" value="3"></td>
                <td>After 5pm </td>
              </tr>
            </table>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="my_ajax2()">ADD</button>
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script type="text/javascript">
  $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var day = button.data('day') 
  var avilable_time1 = button.data('avilable_time1') 
  var avilable_time2 = button.data('avilable_time2') 
  var avilable_time3 = button.data('avilable_time3') 
  var id = button.data('id') 
  var modal = $(this)
  modal.find('.modal-body input').prop('checked', false)
  if (avilable_time1 ==1) {modal.find('#c1').prop('checked', true);}
  if (avilable_time2 ==1) {modal.find('#c2').prop('checked', true);}
  if (avilable_time3 ==1) {modal.find('#c3').prop('checked', true);}
  modal.find('#select_day').empty();
  var op='<option value="'+day+'">'+day+'</option>'
  var days = ['SAT','SUN','MON','TUE','WED','THU','FRI'];
  for(day in days)
  {op = op+'<option value="'+days[day]+'">'+days[day]+'</option>'}
  modal.find('#select_day').append(op);
  modal.find('#row_id').val(id);
})


function my_ajax1(){
    $.ajax({
               type: 'POST',
                url: 'avilable_time_edit',
                cache: false,
                data: {
                      "_token" : $('meta[name=_token]').attr('content'),  
                      form_data: $('#edit_form').serializeArray() 
                    },   
                 success: function (msg) { //console.log(msg)
                      if(msg == '11'){window.location.reload();}
                      else{document.getElementById('error').innerHTML='Ther have error,please try again !!';$('#exampleModal').modal('hide');}
                    }
                });
 }
 function my_ajax2(){
    $.ajax({
               type: 'POST',
                url: 'avilable_time_add',
                cache: false,
                data: {
                      "_token" : $('meta[name=_token]').attr('content'),  
                      form_data: $('#new_form').serializeArray() 
                    },   
                 success: function (msg) { //console.log(msg)
                      if(msg == '11'){window.location.reload();}
                      else{document.getElementById('error').innerHTML='Ther have error,please try again !!';$('#exampleModal').modal('hide');}
                    }
                });
 }
</script>
@endpush