@extends('admin/layouts/app')



@section('headSection')

<link rel="stylesheet" href="{{ asset('admin/plugins/select2/select2.min.css') }}">

@endsection

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
              
             @include('includes.messages')
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('post.update',$post->id)}}" method="post">
               
              {{ csrf_field() }}
               
               {{ method_field('PATCH') }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Post Tilte</label>
                    <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{ $post->title }}">
                  </div>
                  
                     <div class="form-group">
                    <label for="subtitle">Post Sub Tilte</label>
                    <input type="text" class="form-control" id="subtitle" placeholder="Sub Title" name="subtitle" value="{{ $post->subtitle  }}">
                  </div>
                  
                  <div class="form-group">
                    <label for="slug">Post Slug</label>
                    <input type="text" class="form-control" id="slug" placeholder="Post slug" name="slug"  value="{{ $post->slug }}">
                  </div> 
                  
                
                 <div class="form-group">
                  <label>Select Category</label>
                <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="categories[]">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                    @foreach ($post->categories as $postCategory)
                      @if ($postCategory->id == $category->id)
                        selected
                      @endif
                    @endforeach
                    >{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
                 <div class="form-group">
                  <label>Select Tags</label>
                 <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="tags[]">
                     @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}"
                      @foreach ($post->tags as $postTag)
                        @if ($postTag->id == $tag->id)
                          selected
                        @endif
                      @endforeach
                    >{{ $tag->name }}</option>
                    @endforeach
                  </select>
                </div>
                  
                  
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name ="image" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                
                  
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="status" value="1" @if ($post->status == 1)
                        {{'checked'}}
                      @endif>
                     
                    <label class="form-check-label" for="exampleCheck1">Publish</label>
                  </div>
                </div>
                <!-- /.card-body -->
                  <div class="card card-outline card-info">
            <div class="card-header">
              
              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="mb-3">
                   {{ csrf_field() }}
               
                         
                <textarea name="body" class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor1">{{ $post->body }}</textarea>
                          
              </div>
              
            </div>
          </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                   <a type="button" href="{{route('post.index')}}" class="btn btn-warning">Back</a>
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
@section('footerSection')
<script src="//cdn.ckeditor.com/4.11.3/full/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace("editor1");
</script>
<script src="{{ asset('admin/plugins/select2/select2.full.min.js') }}"></script>
<script>
  $(document).ready(function() {
    $(".select2").select2();
  });
</script>



@endsection


