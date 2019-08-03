@extends('Parent/layouts/app')




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
                <div id="main_content">
              <div class="row">
              	<div class="col-md-6">
              		@if($profile->photo)
              		<img src="{{url($profile->photo)}}" width="100%" height="400px" class="rounded mx-auto d-block ">
              		@else
              		<img src="{{url('img/unknown_profile.png')}}" width="100%" height="400px" class="rounded mx-auto d-block ">
              		@endif
              		<h4>{{$profile->name}}</h4>
              	</div>
              	<div class="col-md-4">
              		<p>Email : {{$profile->email}}</p>
              		<p>Phone : {{$profile->phone}}</p>
              		<p>Address : {{$profile->address}}</p>
              		<p>Student Name : {{$profile->student_name}}</p>
              		<p>Student School Name : {{$profile->student_school_name}}</p>
              	</div>
              	<div class="col-md-2">
              		<button type="button" class="btn btn-primary" onclick="edit()">Edit Profile</button>
              	</div>

              </div>
              </div>

                 <div id="edit_content" style="display: none">
                 	<form id="edit_info" method="post" action="{{route('edit_parent_profile')}}" enctype="multipart/form-data">
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
                        <label class="control-label col-md-10 col-sm-10 col-xs-12" for="first-name"> Student  Name <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" class="form-control" name="student_name" value="{{$profile->student_name}}" required="true" placeholder="Enter Student Name">
                        </div>
                      </div>

              	</div>
              	<div class="col-md-6">
              		  <div class="form-group">
                        <label class="control-label col-md-10 col-sm-10 col-xs-12" for="first-name"> Contact Number <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" class="form-control" name="phone" value="{{$profile->phone}}" required="true" placeholder="010000000">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-10 col-sm-10 col-xs-12" for="first-name"> Student School Name <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" class="form-control" name="student_school_name" value="{{$profile->student_school_name}}" required="true" placeholder="Enter Student School Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-10 col-sm-10 col-xs-12" for="first-name"> Address <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" class="form-control" name="address" value="{{$profile->address}}" required="true" placeholder="Enter Student Name">
                        </div>
                      </div>

              	</div>

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

<script type="text/javascript">
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

</script>
@endpush