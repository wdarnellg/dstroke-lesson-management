<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      
      <a class="navbar-brand" href="{{ url('/home') }}"><image src="{{ URL::asset('img/DStrokeLogoD.png') }}" alt="D`Stroke Tennis Logo" height="42px"></image></a>
      
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="{{ route('packages') }}">Packages</a></li>
        <li><a href="#">Contact</a></li>
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