 <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.html">Start Bootstrap</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('tutors')}}">Find Tutor</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact</a>
          </li>

            @if(Auth::guard('parent')->check())
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: white">
                                    {{ Auth::guard('parent')->user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{url('parent/home')}}"><i class="fa fa-qq pull-right"></i> Dashboard</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
        @elseif(Auth::guard('tutor')->check())
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: white">
                                    {{ Auth::guard('tutor')->user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{url('tutor/home')}}"><i class="fa fa-qq pull-right"></i> Dashboard</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
            @elseif(Auth::guard('web')->check())
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: white">
                                    {{ Auth::guard('web')->user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{url('home')}}"><i class="fa fa-qq pull-right"></i> Dashboard</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
        @else         
          <li class="nav-item dropdown margin-top">
                                <a href="#" class="dropdown-toggle color-white" data-toggle="dropdown" role="button" aria-expanded="false" >{{ __('Login') }}</a>
                               
                             

                                <ul class="dropdown-menu" role="menu">
                                    <li class="dropdown-item">
                                        <a href="{{ route('login') }}">
                                            Student
                                        </a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="{{route('parent_login')}}">
                                            Parent
                                        </a>
                                    </li>
                                      <li class="dropdown-item">
                                        <a href="{{route('tutor_login')}}">
                                            Tutor
                                        </a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="{{ route('admin.login') }}">
                                            Admin
                                        </a>
                                    </li>
                                </ul>
                      
                          
                            </li>
              <li class="nav-item dropdown margin-top">
                                <a href="#" class="dropdown-toggle color-white" data-toggle="dropdown" role="button" aria-expanded="false" >{{ __('Register') }}</a>
                               
                             

                                <ul class="dropdown-menu" role="menu">
                                    <li class="dropdown-item">
                                        <a href="{{ route('register') }}">
                                            Student
                                        </a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="{{ route('parent_register') }}">
                                            Parent
                                        </a>
                                    </li>
                                      <li class="dropdown-item">
                                        <a href="{{route('tutor_register')}}">
                                            Tutor
                                        </a>
                                    </li>
                                </ul>
                      
                          
                            </li>

        
             @endif
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url(@yield('home-bg'))">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>@yield('title')</h1>
            <span class="subheading"> @yield('sub-heading')</span>
          </div>
        </div>
      </div>
    </div>
  </header>
