@extends('Tutor/layouts/app')




@section('main-content')

       
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">My Profile</h3>

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
                @if (session('message'))
                  <p class="alert alert-success">{{ session('message') }}</p>
                 @elseif(session('error'))
                 <p class="alert alert-danger">{{ session('error') }}</p>
              @endif

              @if (count($errors) > 0)
				<div class="alert alert-danger">
					<strong>Whoops!</strong> There were some problems with your input.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
                        
              </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row" id="main_content">
              	<div class="col-md-6">
              		@if($profile->photo)
              		<img src="{{url($profile->photo)}}" width="100%" height="400px" class="rounded mx-auto d-block ">
              		@else
              		<img src="{{url('img/unknown_profile.png')}}" width="100%" height="400px" class="rounded mx-auto d-block ">
              		@endif
              		<h4>{{$profile->name}}</h4>
              		<p><b>{{$profile->institute_name}}</b></p>
              	</div>
              	<div class="col-md-4">
              		<p>{{$profile->email}}</p>
              		<p>{{$profile->charge_per_houre}}</p>
              		<p>{{$profile->address}}</p>
              	</div>
              	<div class="col-md-2">
              		<button type="button" class="btn btn-primary" onclick="edit()">Edit Profile</button>
              	</div>
              	<div class="col-md-12"><hr></div>
              	<div class="col-md-12">
              		<h4>About Me</h4>
              		<p>{!!$profile->about!!}</p>
              	</div>
              	<div class="col-md-12">
              		<h4>About my session</h4>
              		<p>{!!$profile->about_my_session!!}</p>
              	</div>
              	
              	   <div class="col-md-12">
                                <div class="d-inline">
                                    <h4 class="sec_title">Academic Qualification</h4>
                                </div>
                                <table class="table table-dark table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th>Degree Name</th>
                                            <th>Institute Name</th>
                                            <th>Grade </th>
                                             <th>Passing Year </th>
                                        </tr>
                                       
                                    </thead>
                                    <tbody>
                                       @if(count($profile->academic_qualification)>0)
                                        @foreach($profile->academic_qualification as $academic_qualification)
                                          <tr>
                                              <td>{{$academic_qualification->degree_name}}</td>
                                              <td>{{$academic_qualification->institute}}</td>
                                              <td>{{$academic_qualification->grade}}</td>
                                              <td>{{$academic_qualification->passing_year}}</td>
                                          </tr>
                                        @endforeach
                                        @endif

                                    </tbody>
                                </table>
                            </div>
              	
              	
              </div>

                 <div id="edit_content" style="display: none">
                 	<form id="edit_info" method="post" action="{{route('edit_tutor_profile')}}" enctype="multipart/form-data">
                 		@csrf
                 	
                  <div class="row" >
              	<div class="col-md-6 offset-md-4">
              		@if($profile->photo)
              		<img src="{{url($profile->photo)}}" width="100%" height="400px" class="rounded mx-auto d-block " id="image">
              		@else
              		<img src="{{url('img/unknown_profile.png')}}" width="100%" height="400px" class="rounded mx-auto d-block " id="image">
              		@endif
              		<br><input type="file" name="photo" onchange="setImage(this)">
              	</div>
                   <div class="col-md-6">
              		  <div class="form-group">
                        <label class="control-label col-md-10 col-sm-10 col-xs-12" for="first-name"> Name <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" class="form-control" name="name" value="{{$profile->name}}" required="true" placeholder="enter your name">
                        </div>
                      </div>

                        <div class="form-group">
                        <label class="control-label col-md-10 col-sm-10 col-xs-12" for="first-name"> Email(LogIn Email) <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="email" class="form-control" name="email" value="{{$profile->email}}" required="true" placeholder="Enter email">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-10 col-sm-10 col-xs-12" for="first-name"> Institute Name <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" class="form-control" name="institute_name" value="{{$profile->institute_name}}" required="true" placeholder="Enter institute_name">
                        </div>
                      </div>

              	</div>
              	<div class="col-md-6">
              		  <div class="form-group">
                        <label class="control-label col-md-10 col-sm-10 col-xs-12" for="first-name"> Charge per houre <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" class="form-control" name="charge_per_houre" value="{{$profile->charge_per_houre}}" required="true" placeholder="£18 - £20 /hr">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-10 col-sm-10 col-xs-12" for="first-name"> Address <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" class="form-control" name="address" value="{{$profile->address}}" required="true" placeholder="Enter your address">
                        </div>
                      </div>

              	</div>
              	<div class="col-md-12"><hr></div>
              	<div class="col-md-12">
              		<h4>About Me</h4>
              		 <div class="form-group">
                        <div class="col-md-112 col-sm-12 col-xs-12">
                          <textarea name="about" id="editor" rows="10" >
				              {!!$profile->about!!}
				            </textarea>
                        </div>
                      </div>

              	</div>
              	<div class="col-md-12">
              		<h4>About my session</h4>
              		 <div class="form-group">
                        <div class="col-md-112 col-sm-12 col-xs-12">
                          <textarea name="about_my_session" id="editor1" rows="10" >
				              {!!$profile->about_my_session!!}
				            </textarea>
                        </div>
                      </div>
              	</div>
              	
              	
              	   <div class="col-md-12">
              	       <?php $education_row_count=0; ?><script type="text/javascript"> var a=0;</script>
                                <div class="d-inline">
                                    <h4 class="sec_title">Academic Qualification</h4>
                                </div>
                                <table class="table table-dark table-hover text-center" id="dynamic_field">
                                    <thead>
                                        <tr>
                                            <th>Degree Name</th>
                                            <th>Institute Name</th>
                                            <th>Grade </th>
                                             <th>Passing Year </th>
                                             <th>More</th>
                                        </tr>
                                       
                                    </thead>
                                    <tbody>
                                       @if(count($profile->academic_qualification)>0)
                                        @foreach($profile->academic_qualification as $academic_qualification)
                                          <tr> <script type="text/javascript">a++; if (a !=1) { document.getElementById("table_last_child<?php echo $education_row_count-1; ?>").innerHTML=''; } </script>@php ($education_row_count++) 
                                          <input type="hidden" name="id{{$education_row_count}}" value="{{$academic_qualification->id}}">
                                              <td><input type="text" class="form-control"  name="degree_name{{$education_row_count}}" value ="{{$academic_qualification->degree_name}}"></td>
                                              <td><input type="text" class="form-control"  name="institute{{$education_row_count}}" value ="{{$academic_qualification->institute}}"></td>
                                              <td><input type="text" class="form-control"  name="grade{{$education_row_count}}" value ="{{$academic_qualification->grade}}"></td>
                                              <td><input type="text" class="form-control"  name="passing_year{{$education_row_count}}" value ="{{$academic_qualification->passing_year}}"></td>
                                              <td id="table_last_child{{$education_row_count}}"><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                                          </tr>
                                        @endforeach
                                        <script type="text/javascript">document.getElementById("table_last_child<?php echo $education_row_count-1; ?>").innerHTML='';  </script>
                                        @else
                                         <?php  $education_row_count = 1; ?>
                                        <tr><script type="text/javascript">a++;</script>
                                         <input type="hidden" name="id1" value="">
                                              <td><input type="text" class="form-control"  name="degree_name1" ></td>
                                              <td><input type="text" class="form-control"  name="institute1" ></td>
                                              <td><input type="text" class="form-control"  name="grade1" ></td>
                                              <td><input type="text" class="form-control"  name="passing_year1"></td>
                                              <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                                          </tr>
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                            
                            <input type="hidden" id="row_count_input" name="row_count" value="{{$education_row_count}}">
              	<div class="col-md-2 offset-md-10">
              		<button class="btn btn-danger" type="button" onclick="cancle()">Cancle</button>
              		<button class="btn btn-primary" type="submit">Update</button>
              	</div>
              </div>
           </form>
                 </div>

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
@endsection
@push('scripts')
<script src="{{url('js/ckeditor.js')}}"></script>

<script type="text/javascript">

 $(document).ready(function(){  
      //for education.........  
      var education=a;    
      $('#add').click(function(){ 
           education++; 
           document.getElementById('row_count_input').value=education;
             $('#dynamic_field').append('<tr id="row'+education+'"> <td ><input type="hidden" name="id'+education+'" value="">  <input type="text" name="degree_name'+education+'" class="form-control cv-table-color" value=""></td> <td> <input type="text" name="institute'+education+'" class="form-control cv-table-color" ></td>  <td><input type="text" name="grade'+education+'" class="form-control cv-table-color"></td> <td><input type="text" name="passing_year'+education+'" class="form-control cv-table-color" ></td> <td><button type="button" name="remove" id="'+education+'" class="btn btn-danger btn_remove">X</button></td></tr>');
      }); 
      
 });
 
  $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id).remove();
           document.getElementById('row_count_input').value=document.getElementById('row_count_input').value-1
      });
      
function setImage(input){
	 if (input.files && input.files[0]) {
	       var reader = new FileReader();
	       reader.onload = function(e) {
	      $('#image').attr('src', e.target.result);
	      }
	     reader.readAsDataURL(input.files[0]);
	    }
   }

   function edit(){
	    document.getElementById('main_content').style.display='none';
	    document.getElementById('edit_content').style.display='block';
   }
    function cancle(){
	    document.getElementById('main_content').style.display='block';
	    document.getElementById('edit_content').style.display='none';
   }
ClassicEditor.create( document.querySelector( '#editor' ) )
        .then( editor => {
               // console.log( editor );
        } )
        .catch( error => {
                console.error( error );
        } );
        ClassicEditor.create( document.querySelector( '#editor1' ) )
        .then( editor => {
               // console.log( editor );
        } )
        .catch( error => {
                console.error( error );
        } );
</script>
@endpush