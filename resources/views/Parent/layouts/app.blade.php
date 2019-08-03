<!DOCTYPE html>
<html lang="en">
<head>
     
@include('Parent.layouts.head')     
     
</head>
<body class="hold-transition sidebar-mini">
   
   <div class="wrapper">
       @include('Parent.layouts.header')
       
       @include('Parent.layouts.sidebar')
       
       
@section('main-content')
      
      @show
       
       @include('Parent.layouts.footer')
   </div>
    
</body>
</html>