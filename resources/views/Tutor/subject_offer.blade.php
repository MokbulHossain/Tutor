@extends('Tutor/layouts/app')




@section('main-content')

       
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Offer Subjects</h3>

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
              <h3 class="card-title">ALL Subjects</h3>
                <a class="col-lg-offset-5 btn btn-success" href="{{route('new_offer_subject')}}" style="display: inline-block;">Add New</a>
                <br><br>
                @if (session('message'))
                  <p class="alert alert-success">{{ session('message') }}</p>
              @endif
                        
              </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Subject</th>
                  <th>Qualification Level</th>
                  <th>Price</th>
                  <th>Grade</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($offer_subjects as $offer_subject)
                
                 <tr>
                  <td>{{$loop->index +1 }}</td>
                  <td>{{$offer_subject->subject}}
                  </td>
                  <td>{{$offer_subject->qualification_level}}</td>
                  <td>{{$offer_subject->price}}</td>
                  <td>{{$offer_subject->grade}}</td>
                  <td><a href="{{ route('offer_subject.edit',$offer_subject->id) }}"> <i class="far fa-edit"></i></a></td>
                 <td>
                              <form id="delete-form-{{ $offer_subject->id }}" method="post" action="{{ route('offer_subject.destroy',$offer_subject->id) }}" style="display: none">
                                {{ csrf_field() }}
                              </form>
                              <a href="" onclick="
                              if(confirm('Are you sure, You Want to delete this?'))
                                  {
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $offer_subject->id }}').submit();
                                  }
                                  else{
                                    event.preventDefault();
                                  }" ><i class="fas fa-trash"></i></a>
                            </td>
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
@endsection