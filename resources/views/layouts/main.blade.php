<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>
        @yield('title','D`Stroke Tennis')
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="{{asset('dist/css/foundation.css')}}"/>
    <link rel="stylesheet" href="{{asset('dist/css/app.css')}}"/>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::secure('css/common.css') }}" type="text/css" />
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" >
    
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<div class="top-bar">
    <div style="color:white" class="top-bar-left">
        <h4 class="brand-title">
            <a href="{{route('home')}}">
                <image src="{{ URL::asset('img/DStrokeLogoD.png') }}" alt="D`Stroke Tennis Logo" height="30px"></image>
            </a>
        </h4>
    </div>
    <div class="top-bar-right">
        
        <ol class="menu">
            <li>
        <ul class="nav navbar-nav navbar-right">
             @if (Auth::guest())
                <li><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <li><a href="{{ url('/register') }}"><span class="glyphicon glyphicon-pencil"></span> Register</a></li>
            @else 
                <li><a href="#">{{ Auth::user()->email }}</a></li>
                <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="true">View <span class="caret"></span></a>
              <ul class="dropdown-menu" style="background-color: yellow">
                <li><a href="{{ url('myfamilyprofile') }}"><span class="glyphicon glyphicon-user"></span> Family Profile</a></li>
                <li><a href="{{ url('mylessonhours') }}"><span class="glyphicon glyphicon-list-alt"></span> Lesson Hours</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="{{ url('dashboard') }}"><span class="glyphicon glyphicon-queen"></span> Admin</a></li>
              </ul>
            </li>
            @endif
                <li>
                    <a href="{{route('packages')}}">
                        Packages
                    </a>
                </li>
                <li>
                    <a href="{{route('cart.index')}}">
                        <i class="fa fa-shopping-cart fa-2x" aria-hidden="true">
                        </i>
                        Hopper
                        <span class="alert badge">
                                   {{Cart::count()}}
                                </span>
                    </a>
                </li>
        
          </ul>
            </li>
            
        </ol>
    </div>
</div>
<div class="container-fluid">@yield('content')</div>



<footer class="footer">
    <div class="row full-width">
        <div class="small-12 medium-4 large-4 columns">
            <i class="fi-laptop"></i>
            
        </div>
        <div class="small-12 medium-4 large-4 columns">
            <image src="{{ URL::asset('img/DStrokeLogoD.png') }}" alt="D`Stroke Tennis Logo" height="30px"></image>
            <p>D`Stroke Tennis is the intellectual property of W. Darnell Greer since 2003.</p>
        </div>

        <div class="small-6 medium-4 large-4 columns">
            <h4>Follow Me</h4>
            <ul class="footer-links">
                <li><a href="https://facebook.com/darnell.greer">Facebook</a></li>
                <li><a href="https://twitter.com/wdarnellg">Twitter</a></li>
            </ul>
        </div>
    </div>
</footer>

<script src="http://code.jquery.com/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{asset('dist/js/vendor/jquery.js')}}"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
  Stripe.setPublishableKey('pk_test_vPCMdOwlt3NigsnFc6bK31oV');
</script>
<script src="{{asset('dist/js/app.js')}}"></script>
</body>
</html>