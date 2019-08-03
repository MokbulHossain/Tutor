@extends('user/app')
@section('home-bg',asset('user/img/home-bg.jpg'))


@section('title','Bitfumes Blog')


@section('sub-heading','Learn Together and Grow Together')

@section('main-content')
 
 
 
 <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
       @foreach($posts as $post)
        <div class="post-preview">
          <a href="{{route('post',$post->slug)}}">
            <h2 class="post-title">
           {{ $post->title}}
            </h2>
            <h3 class="post-subtitle">
               {{ $post->subtitle}}
        
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#">Start Bootstrap</a>
             <small> {{ $post->created_at->diffForHumans() }}</small></p>
        </div>
        @endforeach
        <hr>
         <style>
             .pagination li{
                 padding: 10px 20px;
                 border:1px solid #333;
             }
          </style>
          
           <ul class="pager">
	                <li style="padding:10px 20px!important;" class="next">
	                	{{ $posts->links() }}
	                </li>
	            </ul>
	            
        
      </div>
    </div>
  </div>

  <hr>
 
 @endsection
