@extends('user/app')
@section('home-bg',asset('user/img/home-bg.jpg'))


@section('title','Tutors')


@section('sub-heading','Learn Together and Grow Together')

@section('main-content')
 
     <!-- bootstrap 4 connection using cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="../icon.png">
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.css">
    <!--    font awesome icons-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!--    font awesome icon-->

    <!--google font for text-->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <!--google font for text    -->

    <link rel="stylesheet" href="{{url('css/tutor_css/normalize.css')}}">
    <link rel="stylesheet" href="{{url('css/tutor_css/main.css')}}">
    <link rel="stylesheet" href="{{url('css/tutor_css/find_a_tutor.css')}}">

 
 <!-- Main Content -->
  <div class="container">

  
    <section class="filter_tutor">
        <div class="container">
            <form method="get" action="{{route('search_tutor')}}">
            <div class="row">
                <div class="col-md-4"><label class="d-block" for="">Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter address">
                </div>

                <div class="col-md-4"><label class="d-block" for="">Subject</label><select name="subject" class="form-control">
                    @foreach($qualififations as $qualififation)
                        <option value="{{$qualififation->subject}}">{{$qualififation->subject}}</option>
                        @endforeach
                    </select></div>
                <div class="col-md-3"><label class="d-block" for="">Subject</label><select name="qualification_level" class="form-control">
                    @foreach($qualification_levels as $qualification_level)
                        <option value="{{$qualification_level->qualification_level}}">{{$qualification_level->qualification_level}}</option>
                    @endforeach
                    </select></div>
                
              <div class="col-md-1">
                  <input type="submit" class="btn btn-primary" value="Search" style="margin-top: 25px;">
              </div>
            </div>
            </form>
        </div>
    </section>


    <section class="view_profile">
        <div class="container">
            @foreach($tutors as $tutor)
            <div class="profile_wrapper">
                <a href="{{route('tutor_details',$tutor->id)}}">
                    <div class="row">
                        <div class="col-md-2">
                            @if($tutor->photo)
                            <img src="{{url($tutor->photo)}}" width="100%" alt="">
                            @else
                            <img src="{{url('img/unknown_profile.png')}}" width="100%" alt="">
                            @endif
                        </div>
                        <div class="col-md-8 px-4 ">
                            <div class="tutor_name">
                                <h3>{{$tutor->name}}</h3>
                            </div>
                            <div class="institute">
                                <p>{{$tutor->institute_name}}</p>

                            </div>
                            <div class="description">
                                <p>{!!$tutor->about!!} </p>
                            </div>
                            <div class="subject_provide">
                                <p class="tutortile__subject">
                                    @if(count($tutor->offer_subjects)>0)
                                 @foreach($tutor->offer_subjects as $offer_subject)
                                     {{$offer_subject->subject}},
                                 @endforeach
                                 @endif
                                    <span id="vTF:tutorlist:0:subjectsmore"> {{--+3 more--}}</span></p>

                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="tutor_price">
                                <h3>{{$tutor->charge_per_houre}}</h3>
                            </div>
                            {{--<div class="gurantee">
                                <p class="" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">
                                    <img src="../img/guarantee-icon.svg"> MyTutor guarantee
                                </p>
                            </div>--}}
                            <div class="completed_lesson"><p><span>67</span> completed lessons</p></div>
                            <button type="button" class="btn btn-primary btn-block">View Profile</button>
                        </div>
                    </div>
                </a>             
                </div>

              @endforeach
              {{ $tutors->links() }}
        </div>
    </section>
  </div>

  <hr>
 
 @endsection

