<!DOCTYPE html>
<html lang="en">
<head>
     
@include('layouts.head')     
     
</head>
<body class="hold-transition sidebar-mini">
   
   <div class="wrapper">
       @include('layouts.header')
      
       @include('layouts.sidebar')
       
       
@section('main-content')
      
      @show
       
       @include('layouts.footer')
   </div>
    
</body>
</html>