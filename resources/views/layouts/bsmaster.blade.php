<!DOCTYPE html>
<html lang="en">
<head>
  <title>D`Stroke Tennis</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" >
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
  @yield('styles')
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      
      <a class="navbar-brand" href="{{ url('/') }}"><image src="{{ URL::asset('img/DStrokeLogoD.png') }}" alt="D`Stroke Tennis Logo" height="42px"></image></a>
      
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="{{ route('packages') }}">Packages</a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
         @if (Auth::guest())
            <li><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <li><a href="{{ url('/register') }}"><span class="glyphicon glyphicon-pencil"></span> Register</a></li>
        @else 
            <li><a href="#">{{ Auth::user()->email }}</a></li>
            <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="true">View <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ url('myfamilyprofile') }}"><span class="glyphicon glyphicon-user"></span> Family Profile</a></li>
            <li><a href="{{ url('mylessonhours') }}"><span class="glyphicon glyphicon-list-alt"></span> Lesson Hours</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ url('dashboard') }}"><span class="glyphicon glyphicon-queen"></span> Admin</a></li>
          </ul>
        </li>
        @endif
      </ul>
      
    </div>
  </div>
</nav>
  @section('sidebar-left')
   <div class="col-sm-2 sidenav">
    </div>
  @show
<div class="container-fluid text-center">    
  <div class="row content">
     
   
    <div class="col-sm-8 text-left"> 
      @yield('content')
      
    </div>
    
    @section('sidebar-right')
    <div class="col-sm-2 sidenav">
     
    </div>
    @show
  </div>
</div>

<footer class="container-fluid text-center">
  <p><span class="glyphicon glyphicon-copyright-mark"></span>THAT DARN Web</p>
</footer>

</body>
</html>