<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ url('/home') }}"><img alt="Brand" src="{{ URL::to('/src/img/DStrokeLogoD.png') }}"></a>
      <a class="navbar-brand" href="{{ url('/index') }}">Packages</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="{{ route('package.shoppingCart') }}">
            <i class="fa fa-cart-plus" aria-hidden="true"></i> View Cart
            <span class="badge">
              {{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}
            </span>
            </a></li>
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
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>