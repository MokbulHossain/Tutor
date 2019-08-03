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
                        <h3 class="card-title">Update Admin</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    @include('includes.messages')
                    <form role="form" action="{{ route('user.update',$user->id)}}" method="post">

                         {{ csrf_field() }}
                         {{ method_field('PUT') }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">User Name</label>
                                <input type="text" class="form-control" id="name" placeholder="User Name" value="@if (old('name')){{ old('name') }}@else{{ $user->name }}@endif"  name="name">
                            </div>



                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="email" value="@if (old('email')){{ old('email') }}@else{{ $user->email }}@endif">
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="phone" value="@if (old('phone')){{ old('phone') }}@else{{ $user->phone }}@endif">
                            </div>

  

                           
                           <div class="form-group">
                  <label for="confirm_passowrd">Status</label>
                  <div class="checkbox">
                    <label ><input type="checkbox" name="status" @if (old('status')==1 || $user->status == 1)
                      checked
                    @endif value="1" >Status</label>
                  </div>
                </div>
                           
                            <div class="form-group">
                                <label>Assign Role</label>
                                <div class="row">
                                    @foreach ($roles as $role)
                                    <div class="col-lg-3">
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="role[]" value="{{ $role->id }}"> {{ $role->name }}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('user.index') }}" class="btn btn-warning">Back</a>
                            </div>


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
