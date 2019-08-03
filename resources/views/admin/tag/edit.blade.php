@extends('admin.layouts.app')


@section('main-content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Text Editors</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Enter Your text</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
         
  <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Titles</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @include('includes.messages')
              <form role="form" action="{{ route('tag.update',$tag->id)}}" method="post">
               
                 {{ csrf_field() }}
                  {{ method_field('PATCH') }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Tag Title</label>
                    <input type="text" class="form-control" id="name" placeholder="Tag title" name="name" value="{{ $tag->name }}" >
                  </div>
                  
                    
                  
                  <div class="form-group">
                    <label for="slug">Tag Slug</label>
                    <input type="text" class="form-control" id="slug" placeholder="Tag slug" name="slug" value="{{ $tag->slug }}">
                  </div>
                  
                 
                
                  
                
                </div>
                

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <a type="button" href="{{route('tag.index')}}" class="btn btn-warning">Back</a>
                </div>
              </form>
            </div>
            <!-- /.card -->

        
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>

@endsection