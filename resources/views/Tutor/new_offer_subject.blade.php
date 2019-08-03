@extends('Tutor/layouts/app')




@section('main-content')

       
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Add New Offer Subjects</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          @if (session('message'))
                  <p class="alert alert-danger">{{ session('message') }}</p>
              @endif
           <div class="card">
            @if(isset($qualififation))
                <form class="offset-md-2 " method="post" action="{{route('update_offer_subject')}}">
                <input type="hidden" name="id" value="{{$qualififation->id}}">
                       @csrf
                      <div class="form-group">
                        <label class="control-label col-md-10 col-sm-10 col-xs-12" for="first-name">Subject Name <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" name="subject_name" required="required" class="form-control col-md-10 col-xs-12" value="{{$qualififation->subject}}" placeholder="Enter Subject Name" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-10 col-sm-10 col-xs-12" for="first-name">Qualification Level <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input class="form-control col-md-10 col-xs-12" name="qualification_level" value="{{$qualififation->qualification_level}}" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-10 col-sm-10 col-xs-12" for="first-name">Price <span class="required">* (taka per/hr)</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="number" name="Price" required="required" class="form-control col-md-10 col-xs-12" placeholder="Price" value="{{$qualififation->price}}">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="submit" value="Update" class="btn btn-primary">
                        </div>
                      </div>
            @else
            <form class="offset-md-2 " method="post" action="{{route('submit_offer_subject')}}">
           
                     @csrf
                      <div class="form-group">
                        <label class="control-label col-md-10 col-sm-10 col-xs-12" for="first-name">Subject Name <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" name="subject_name" required="required" class="form-control col-md-10 col-xs-12" value="" placeholder="Enter Subject Name" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-10 col-sm-10 col-xs-12" for="first-name">Qualification Level <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input class="form-control col-md-10 col-xs-12" name="qualification_level">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-10 col-sm-10 col-xs-12" for="first-name">Price <span class="required">* (taka per/hr)</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="number" name="Price" required="required" class="form-control col-md-10 col-xs-12" placeholder="Price">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="submit" value="Submit" class="btn btn-primary">
                        </div>
                      </div>
                     @endif
                </form>
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