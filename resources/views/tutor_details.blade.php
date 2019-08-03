
@extends('user/app')
@section('home-bg',asset('user/img/home-bg.jpg'))


@section('title','tutor_Details')


@section('sub-heading','Learn Together and Grow Together')

@section('main-content')
   <!-- bootstrap 4 connection using cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.css">
    <!--    font awesome icons-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    
    <!--    font awesome icon-->

    <!--google font for text-->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <!--google font for text    -->

    <link rel="stylesheet" href="{{url('css/tutor_css/normalize.css')}}">
    <link rel="stylesheet" href="{{url('css/tutor_css/main.css')}}">
 
 
 <!-- Main Content -->
  <div class="container">
   
   <section id="tutor_profile">
     @if (session('message'))
                  <p class="alert alert-success">{{ session('message') }}</p>
                 @elseif(session('error'))
                 <p class="alert alert-danger">{{ session('error') }}</p>
              @endif
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="content_wrapper">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="tutor_avatar">
                            @if($tutor->photo)
                            <img src="{{url($tutor->photo)}}" width="100%" alt="" class="img-fluid">
                            @else
                            <img src="{{url('img/unknown_profile.png')}}" class="img-fluid" width="100%" alt="">
                            @endif
                        </div>
                            </div>
                            <div class="col-md-9">
                                <div class="tutor_info">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="tutor_name">
                                                <h3>{{$tutor->name}}</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="tutor_price">
                                                <h3>{{$tutor->charge_per_houre}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="tutor_institute">
                                                <p>{{$tutor->institute_name}}</p>
                                            </div>
                                            
<fieldset class="rating">
    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
    <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
    <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
    <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
    <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
    <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
</fieldset>
<!--

                                            <div class="rating">
                                                <span title="five stars">&#9734;</span>
                                                <span title="four stars">&#9734;</span>
                                                <span title="three stars">&#9734;</span>
                                                <span title="two stars">&#9734;</span>
                                                <span title="one star">&#9734;</span>
                                            </div>
-->
                                            <div class="d-inline review_scale">5.0</div>
                                            <div class="d-inline"><a href="#" class="count_review">2 reviews</a></div>
                                            <p class="lessoncount"><span>{{count($hires)}}</span> completed lessons</p>
                                            
                                            <div class="col-md-4 offset-md-8">
                                                @if(Auth::guard('parent')->check())<a class="btn btn-primary" href="{{route('hire_me',$tutor->id)}}">Hire Me</a>
                                                @elseif(Auth::guard('web')->check())<a class="btn btn-primary" href="{{route('hire_tutor',$tutor->id)}}">Hire Me</a>
                                                @else <a class="btn btn-primary" href="{{route('login')}}">Hire Me</a>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-inline  float-left about_me_title">ABOUT ME</div>
                                <div class="d-inline  float-right save_profile"><a href="">Save Profile</a></div>
                                <div class="about_info">
                                    <span class="more">
                                      {!!$tutor->about!!}
                                    </span>
                                </div>
                            </div>



                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-inline">
                                    <h4 class="sec_title">ABOUT MY SESSIONS</h4>
                                </div>

                                <div class="about_info">
                                    <span class="more">
                                        {!!$tutor->about_my_session!!}
                                    </span>
                                </div>
                            </div>



                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="interview">
                                    <div class="interview_image float-left"><img src="img/interviewed.svg" class="img-fluid" alt=""></div>
                                    <div class="interview_content float-right">
                                        <h4>Personally interviewed by MyTutor</h4>
                                        <p>We only take tutor applications from candidates who are studying at the UK’s leading universities. Candidates who fulfil our grade criteria then pass to the interview stage, where a member of the MyTutor team will personally assess them for subject knowledge, communication skills and general tutoring approach. About 1 in 7 becomes a tutor on our site.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="interview">
                                    <div class="interview_image float-left"><img src="img/dbs.svg" class="img-fluid" alt=""></div>
                                    <div class="interview_content float-right">
                                        <h4>Enhanced DBS Check</h4>
                                        <apan>02/10/2018</apan>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                            <div class="row">
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
                                       @if(count($tutor->academic_qualification)>0)
                                        @foreach($tutor->academic_qualification as $academic_qualification)
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
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-inline">
                                    <h4 class="sec_title">QUALIFICATIONS</h4>
                                </div>
                                <table class="table table-dark table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Qualification</th>
                                            <th>Prices</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($tutor->offer_subjects)>0)
                                         @foreach($tutor->offer_subjects as $offer_subject)
                                        <tr>
                                            <td>{{$offer_subject->subject}}</td>
                                            <td>{{$offer_subject->qualification_level}}</td>
                                            <td>{{$offer_subject->price}}/hr</td>
                                        </tr>
                                        @endforeach
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-inline">
                                    <h4 class="sec_title">GENERAL AVAILABILITY</h4>
                                </div>
                                <table class="table table-dark table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th> </th>
                                            <th><img src="img/morning.svg" class="img-fluid mx-auto d-block" alt=""><span class="d-block">Pre 12pm</span></th>
                                            <th><img src="img/afternoon.svg" class="img-fluid mx-auto d-block" alt="">12 - 5pm</th>
                                            <th><img src="img/evening.svg" class="img-fluid mx-auto d-block" alt="">After 5pm</th>
                                        </tr>
                                    </thead>
                                    <tbody>

 @foreach($days as $day=>$value)
              @php $i=0; @endphp
              <tr>
               <td>{{$days[$day]}}</td>
               @if(count($tutor->avilabilities)>0)
                @foreach ($tutor->avilabilities as $avilabilitie)
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

                    @php $i++; @endphp
                @endif
                @endforeach 
                @endif
                  @if($i == 0)
                <td></td>
                <td></td>
                <td></td>
                @endif
              </tr>
              @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-inline">
                                    <h4 class="sec_title">SUBJECTS OFFERED</h4>
                                </div>
                                <table class="table table-dark table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Qualification</th>
                                            <th>Prices</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @if(count($tutor->offer_subjects)>0)
                                         @foreach($tutor->offer_subjects as $offer_subject)
                                        <tr>
                                            <td>{{$offer_subject->subject}}</td>
                                            <td>{{$offer_subject->qualification_level}}</td>
                                            <td>{{$offer_subject->price}}/hr</td>
                                        </tr>
                                        @endforeach
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
<div class="row">
                            <div class="col-md-12">
                                <div class="d-inline">
                                    <h4 class="sec_title">QUESTIONS DIPALI HAS ANSWERED</h4>
                                </div>
                                <div class="question"><h3>What is contained within a nucleus of a cell and how is this made up or arranged</h3></div>
                                <div class="answer"><p>DNA is contained within the nucleus of the cell. It contains genes which are a sequence of DNA codes. Each gene codes for a protein. All the DNA is coiled into structures called chromosomes. There are 46 chromosomes in total.</p></div>
                                <div class="view"><span class="float-left">5 months ago</span><span class="float-right">144 views</span></div>
                                 
                            </div>
                        </div>
                        <hr>

                    </div>

                </div>
                <div class="col-md-4">
                    <div class="sidebar_wrapper">
                        <div class="contact_us">
                            <form id="contact" action="{{route('contact_submit')}}" method="post">
                                @csrf
                                <h3>Quick Contact</h3>
                                <h4>Contact us today, and get reply with in 24 hours!</h4>
                                <fieldset>
                                    <input placeholder="Your name" type="text" tabindex="1" required autofocus name="name">
                                </fieldset>
                                <fieldset>
                                    <input placeholder="Your Email Address" type="email" tabindex="2" required name="email">
                                </fieldset>
                                <fieldset>
                                    <input placeholder="Your Phone Number" type="tel" tabindex="3" required name="phone">
                                </fieldset>
                                <fieldset>
                                    <input placeholder="Your Web Site starts with http://" type="url" tabindex="4" name="web_url">
                                </fieldset>
                                <fieldset>
                                    <textarea placeholder="Type your Message Here...." tabindex="5" required name="message"></textarea>
                                </fieldset>
                                <fieldset>
                                    <button type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
  </div>

  <hr>
 
 @endsection
