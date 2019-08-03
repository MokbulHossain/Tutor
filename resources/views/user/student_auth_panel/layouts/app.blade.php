<!DOCTYPE html>
<html lang="en">
<head>
     
@include('Tutor.layouts.head')     
     
</head>
<body class="hold-transition sidebar-mini">
   
   <div class="wrapper">
       @include('Tutor.layouts.header')
       
       @include('Tutor.layouts.sidebar')
       
       
@section('main-content')
      
      @show
       
       @include('Tutor.layouts.footer')
   </div>
    
</body>
</html>